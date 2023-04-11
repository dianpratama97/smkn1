<?php

namespace App\Http\Controllers;

use App\Models\AkademikBlog;
use Illuminate\Http\Request;

class AkademikBlogController extends Controller
{
    public function index()
    {
        return view('setting.akademik.index');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(AkademikBlog $akademikBlog)
    {
        
    }

    public function edit(AkademikBlog $akademikBlog)
    {
        
    }

    public function update(Request $request, AkademikBlog $akademikBlog)
    {
        
    }

    public function destroy(AkademikBlog $akademikBlog)
    {
        
    }
}
