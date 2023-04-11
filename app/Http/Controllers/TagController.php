<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:tags_show', ['only' => ['index']]);
    //     $this->middleware('permission:tags_create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:tags_update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:tags_delete', ['only' => ['delete']]);
    // }
    private $perPage = 10;
    public function index(Request $request)
    {
        $tags = $request->get('keyword')
            ? Tag::search($request->keyword)->paginate($this->perPage)
            : Tag::paginate($this->perPage);

        return view('cms.tags.index', [
            'tags' => $tags->appends(['keyword' => $request->keyword]),
        ]);
    }

    public function select(Request $request)
    {
        $tags = [];
        if ($request->has('q')) {
            $tags = Tag::select('id', 'title')->search($request->q)->get();
        } else {
            $tags = Tag::select('id', 'title')->limit(5)->get();
        }

        return response()->json($tags);
    }

    public function create()
    {
        return view('cms.tags.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'slug' => 'required|string|unique:tag,slug',
        ])->validate();

        try {
            Tag::create([
                'title'     => $request->title,
                'slug'      => $request->slug,
            ]);
            Alert::success('Berhasil.', 'Data Ditambahkan.');

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(Tag $tag)
    {
    }

    public function edit(Tag $tag)
    {
        return view('cms.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'slug' => 'required|string|unique:tag,slug,'  . $tag->id
        ])->validate();

        try {
            $tag->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
            ]);
            Alert::success('Berhasil.', 'Data Diedit.');

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        }

        return redirect()->route('tags.index');
    }
}
