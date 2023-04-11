<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:jurusan_show', ['only' => ['index']]);
    }
    public function index()
    {
        return view('akademik.master_data.jurusan.index');
    }
}
