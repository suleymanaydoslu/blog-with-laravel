<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\BasePanelController as PanelController;
use App\Models\Comment;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use function redirect;

class NewslettersController extends PanelController
{
    /** @var Newsletter */
    protected $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->view_path = 'newsletters';
        $this->newsletter = $newsletter;
    }

    public function index(Request $request)
    {
        $news = $this->newsletter->paginate(10);
        return $this->view('home', ['news' => $news]);
    }

    public function delete(Request $request, Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('panel.newsletters.index')->with('success','Deleted successfuly');
    }
}
