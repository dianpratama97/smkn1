<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kategori_show', ['only' => ['index']]);
        $this->middleware('permission:kategori_detail', ['only' => ['show']]);
        $this->middleware('permission:kategori_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kategori_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kategori_delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        $kategori = Kategori::with('turunan');
        if ($request->has('keyword') && trim($request->keyword)) {
            $kategori->search($request->keyword);
        } else {
            $kategori->onlyParent();
        }

        // $kategori = Kategori::onlyParent()->with('turunan')->get();
        return view('cms.kategori.index', [
            'kategori' => $kategori->paginate(5),
        ]);
    }

    public function select(Request $request)
    {
        $kategori = [];
        if ($request->has('q')) {
            $search = $request->q;
            $kategori = Kategori::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(6)->get();
        } else {
            $kategori = Kategori::select('id', 'title')->onlyParent()->limit(6)->get();
        }

        return response()->json($kategori);
    }

    public function create()
    {
        return view('cms.kategori.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'desc' => 'required',
            'slug' => 'required|string|unique:kategori,slug',
        ]);

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id', 'title')->find($request->parent_category);
            }

            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            Kategori::create([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'desc'      => $request->desc,
                'parent_id' => $request->parent_category,
            ]);
            Alert::success('Berhasil.', 'Data Ditambahkan.');

            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id', 'title')->find($request->parent_category);
            }
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(Kategori $kategori)
    {
        return view('cms.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('cms.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'desc' => 'required',
            'slug' => 'required|string|unique:kategori,slug,' . $kategori->id,
        ]);

        if ($validator->fails()) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id', 'title')->find($request->parent_category);
            }

            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $kategori->update([
                'title'     => $request->title,
                'slug'      => $request->slug,
                'desc'      => $request->desc,
                'parent_id' => $request->parent_category,
            ]);
            Alert::success('Berhasil.', 'Data Di edit.');

            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            if ($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id', 'title')->find($request->parent_category);
            }
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        }

        return redirect()->route('kategori.index');
    }
}
