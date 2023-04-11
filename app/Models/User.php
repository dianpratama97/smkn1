<?php

namespace App\Models;

use App\Models\Pendaftaran;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'status',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ppdb()
    {
        return $this->hasOne(Pendaftaran::class);
    }

    public function biodata()
    {
        return $this->hasOne(Ppdb::class);
    }

    public function level()
    {
        return $this->hasOne(Model_has_role::class, 'model_id');
    }


    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'level');
    }

}
