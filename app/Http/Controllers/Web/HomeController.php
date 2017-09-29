<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseWebController as WebController;
use App\Models\Category;
use App\Models\Comment;
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function commentPost(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required'
        ];

        $this->validate($request,$rules);

        $comment = Comment::make($request->intersect([
            'email',
            'name',
            'comment'
        ]));

        $comment->post_id = $id;
        $comment->status = 1;
        $comment->save();

        return redirect()->back()->with('success','Comment created successfully');
    }
}
