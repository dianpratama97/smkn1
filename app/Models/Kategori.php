<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $guarded = [];

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function turunan()
    {
        return $this->children()->with('turunan');
    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }
}
