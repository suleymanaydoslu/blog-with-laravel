<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseWebController as WebController;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends WebController
{
    public function __construct()
    {
        $this->view_path = 'posts';
    }

    public function allPosts(Request $request)
    {
        $categories = Category::all();
        $posts = Post::query()->where('status','=',1)->paginate(10);
        return $this->view('allPosts',[
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function readPost(Request $request, $slug)
    {
        $post = Post::query()->where('slug','=',$slug)
                            ->where('status','=',1)
                            ->firstOrFail();
        $categories = Category::all();
        $comments = Comment::query()->where('post_id','=',$post->id)
                                    ->where('status','=',1)
                                    ->get();

        return $this->view('readPost',[
            'post' => $post,
            'categories' => $categories,
            'comments' => $comments
        ]);
    }

    public function categoryDetail(Request $request, $slug)
    {
        $category = Category::query()->where('slug','=',$slug)->firstOrFail();
        $posts = BlogCategory::query()->where('category_id','=',$category->id)->get();
        $categories = Category::all();

        return $this->view('categoryDetail',[
            'category' => $category,
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
