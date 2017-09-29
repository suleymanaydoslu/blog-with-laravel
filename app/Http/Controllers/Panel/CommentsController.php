<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\BasePanelController as PanelController;
use App\Models\Comment;
use Illuminate\Http\Request;
use function redirect;

class CommentsController extends PanelController
{
    /** @var Comment */
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->view_path = 'comments';
        $this->comment = $comment;
    }

    public function index(Request $request)
    {
        $comments = $this->comment->paginate(10);
        return $this->view('home', ['comments' => $comments]);
    }

    public function show(Request $request, Comment $comment)
    {
        return $this->view('show',['comment' => $comment]);
    }

    public function delete(Request $request, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('panel.comments.index')->with('success','Deleted successfuly');
    }

    public function active(Request $request, Comment $comment)
    {
        $comment->status = 1;
        $comment->save();
        return redirect()->route('panel.comments.index')->with('success','Comment has made active successfuly');
    }

    public function passive(Request $request, Comment $comment)
    {
        $comment->status = 0;
        $comment->save();
        return redirect()->route('panel.comments.index')->with('success','Comment has made passive successfuly');
    }
}
