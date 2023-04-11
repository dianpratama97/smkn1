<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:agama_show', ['only' => ['index']]);
    }
    public function index()
    {
        return view('akademik.master_data.agama.index');
    }
}
