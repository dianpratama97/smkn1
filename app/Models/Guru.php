<?php

namespace App\Models;

use App\Models\Kepegawaian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = [];

    public function pegawaian()
    {
        return $this->belongsTo(Kepegawaian::class, 'status_pegawai_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
