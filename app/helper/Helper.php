<?php

use App\Models\Guru;
use App\Models\Post;
use App\Models\Ppdb;
use App\Models\User;
use App\Models\Setting;
use App\Models\Kategori;
use App\Models\JurusanBlog;
use App\Models\TugasSiswa;
use App\Models\WaKepsek;
use phpDocumentor\Reflection\Types\Null_;

if (!function_exists('set_active')) {


  function set_active($uri, $output = 'active')
  {
    if (is_array($uri)) {
      foreach ($uri as $u) {
        if (Route::is($u)) {
          return $output;
        }
      }
    } else {
      if (Route::is($uri)) {
        return $output;
      }
    }
  }
}

function setting()
{
  return Setting::get()->first();
}

function user()
{
  return User::get()->first();
}

function dkv()
{
  return JurusanBlog::where('name', 'DKV')->get()->first();
}
function tkj()
{
  return JurusanBlog::where('name', 'TKJ')->get()->first();
}
function tbsm()
{
  return JurusanBlog::where('name', 'TBSM')->get()->first();
}
function lp()
{
  return JurusanBlog::where('name', 'LP')->get()->first();
}

function tugasSiswa()
{
  return TugasSiswa::withCount('tugas')->where([
    'siswa_id' => auth()->user()->id,
    'status' => 1
  ])->get();
}

function wakilKepsek()
{
  return WaKepsek::get();
}

function post()
{
  return Post::orderBy('id', 'DESC')->take(3)->get();
}

function posts()
{
  return Post::orderBy('id', 'DESC')->get();
}

function data()
{
  return Ppdb::where([
    'jalur_pendaftaran_siswa' => 'prestasi',
  ])->get();
}

function dataJurusan()
{
  return JurusanBlog::get();
}

function jumlah_siswa_kelas10()
{
  return  User::where('kelas', 10)->count();
}

function jumlah_siswa_kelas11()
{
  return User::where('kelas', 11)->count();
}

function jumlah_siswa_kelas12()
{
  return User::where('kelas', 12)->count();
}

