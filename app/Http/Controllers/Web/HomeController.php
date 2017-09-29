<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseWebController as WebController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends WebController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request)
    {
        $posts = Post::query()->where('status', '=', 1)
                                ->limit(5)
                                ->orderBy('created_at', 'asc')
                                ->get();
        $categories = Category::all();

        return view('web.home', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
