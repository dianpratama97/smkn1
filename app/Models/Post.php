<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class)->withTimestamps();
    }

    public function scopePublish($query)
    {
        return $query->where('status', "publish");
    }

    public function scopeDraft($query)
    {
        return $query->where('status', "draft");
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%{$title}%");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
