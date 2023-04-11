<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
