<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {

        return view('welcome');
    }

    public function menu()
    {
        return view('blog.layouts.menu');
    }

    public function berita()
    {

        return view('blog.berita.index');
    }

    public function alumni()
    {
        return view('blog.alumni.index', [
            'alumni' => Alumni::get()
        ]);
    }

    public function bacaBerita($slug)
    {
        $post = Post::where('slug', $slug)->get()->first();
        return view('blog.berita.read', compact('post'));
    }
}
