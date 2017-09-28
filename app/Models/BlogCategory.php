<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    const TABLE = 'blog_categories';
    protected $table = self::TABLE;

    protected $fillable = [
        'post_id',
        'category_id'
    ];
}
