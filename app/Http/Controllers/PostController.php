<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post_show', ['only' => ['index']]);
        $this->middleware('permission:post_detail', ['only' => ['show']]);
        $this->middleware('permission:post_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post_delete', ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : "publish";

        $posts = $statusSelected == 'publish' ? Post::publish() : Post::draft();
        if ($request->get('keyword')) {
            $posts->search($request->get('keyword'));
        }
        return view('cms.posts.index', [
            'posts' => $posts->paginate(9)->withQueryString(),
            'status' =>  $this->status(),
            'statusSelected' => $statusSelected
        ]);
    }

    public function create()
    {
        return view('cms.posts.create', [
            'kategori' => Kategori::with('turunan')->onlyParent()->get(),
            'status' => $this->status()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:200',
            'slug' => 'required|string|unique:posts,slug',
            'thumbnail' => 'required|image|file|max:5000',
            'category' => 'required',
            'content' => 'required',
            'tag' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        if ($request->file('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('foto-post');
        }

        DB::beginTransaction();
        try {
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $request->slug,
                'thumbnail' => $thumbnail,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            $post->tags()->attach($request->tag);
            $post->kategori()->attach($request->category);


            Alert::success('Berhasil.', 'Data Ditambahkan.');

            return redirect()->route('posts.index');
        } catch (\Throwable $th) {

            DB::rollBack();
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function show(Post $post)
    {
        $categories = $post->kategori;
        $tags = $post->tags;
        return view('cms.posts.show', compact('post', 'categories', 'tags'));
    }

    public function edit(Post $post)
    {

        return view('cms.posts.edit', [
            'post' => $post,
            'kategori' => Kategori::with('turunan')->onlyParent()->get(),
            'status' => $this->status()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:200',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'category' => 'required',
            'thumbnail' => 'image|file|max:5000',
            'content' => 'required',
            'tag' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        if ($request->file('thumbnail')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $thumbnail = $request->file('thumbnail')->store('foto-post');
        } else {
            $thumbnail = $request->oldFoto;
        }

        DB::beginTransaction();
        try {
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => $request->slug,
                'thumbnail' => $thumbnail,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            $post->tags()->sync($request->tag);
            $post->kategori()->sync($request->category);


            Alert::success('Berhasil.', 'Data Di Edit.');

            return redirect()->route('posts.index');
        } catch (\Throwable $th) {

            DB::rollBack();
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function destroy(Post $post)
    {

        DB::beginTransaction();
        try {
            if ($post->thumbnail) {
                Storage::delete($post->thumbnail);
            }
            $post->tags()->detach();
            $post->kategori()->detach();
            $post->delete();

            Alert::success('Berhasil.', 'Data Di Hapus.');
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        } finally {
            DB::commit();
            return redirect()->route('posts.index');
        }
    }

    private function status()
    {
        return [
            'draft' => 'Draft',
            'publish' => 'Publish',
        ];
    }
}
