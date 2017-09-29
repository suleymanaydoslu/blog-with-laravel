<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    const TABLE = 'posts';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover_image',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->hasMany(BlogCategory::class);
    }
}
