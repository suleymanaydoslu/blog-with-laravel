<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function str_slug;

class Category extends Model
{
    const TABLE = 'categories';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts()
    {
        return $this->hasManyThrough( Post::class, BlogCategory::class,'category_id','id');
    }
}
