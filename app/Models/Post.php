<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const TABLE = 'posts';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover_image',
        'status'
    ];

    public function categories()
    {
        return $this->hasMany(BlogCategory::class);
    }
}
