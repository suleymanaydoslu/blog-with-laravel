<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\Panel\Post\CreateRequest;
use App\Http\Requests\Panel\Post\DeleteRequest;
use App\Http\Requests\Panel\Post\EditRequest;
use App\Http\Requests\Panel\Post\ShowRequest;
use App\Http\Requests\Panel\Post\StoreRequest;
use App\Http\Requests\Panel\Post\IndexRequest;
use App\Http\Requests\Panel\Post\UpdateRequest;
use App\Models\BlogCategory;
use App\Models\Post;
use App\Models\Category;
use function file_exists;
use Illuminate\Http\Request;
use App\Http\Controllers\BasePanelController as PanelController;
use function unlink;

class PostController extends PanelController
{
    /** @var Post */
    protected $post;

    /** @var BlogCategory */
    protected $blogCategory;

    public function __construct(Post $post, BlogCategory $blogCategory)
    {
        $this->view_path = 'posts';
        $this->post = $post;
        $this->blogCategory = $blogCategory;
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(IndexRequest $request)
    {
        $posts = $this->post->paginate(10);
        return $this->view('home', ['posts' => $posts]);
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CreateRequest $request)
    {
        $categories = Category::all();
        return $this->view('create', [
            'categories' => $categories
        ]);
    }


    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $post = $this->post->fill([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'content' => $request->get('content'),
            'status' => $request->get('status'),
        ]);

        $post->cover_image = $this->storePicture($request);

        $post->save();

        /**  Saving categories  */
        $categoryModels = collect();
        collect((array)$request->get('categories'))->each(function ($category) use ($categoryModels, $post) {
            $categoryModels->push($this->blogCategory->make([
                'post_id' => $post->id,
                'category_id' => $category,
            ]));
        });
        $post->categories()->saveMany($categoryModels);

        return redirect()->route('panel.posts.index')->with('success', 'Post created successfully');
    }

    /**
     * A method for uploading image
     * @param Request $request
     * @return string
     */
    protected function storePicture(Request $request, Post $post = null)
    {
        if ($request->file('cover_image') && $request->file('cover_image')->isValid()) {

            if($post && $post->cover_image){

                unlink($post->cover_image);
            }

            $image = $request->file('cover_image');
            $imageName = str_random(10) . "." . $image->extension();
            $path = $image->storeAs('post_images', $imageName);

            return config('app.storage_path') . $path;
        }

        return $post ? $post->cover_image : '';
    }

    /**
     * @param ShowRequest $request
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ShowRequest $request, Post $post)
    {
        return $this->view('show',[
            'post' => $post
        ]);
    }

    /**
     * @param EditRequest $request
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditRequest $request, Post $post)
    {
        $categories = Category::all();
        $postCategories = $post->categories()->pluck('category_id')->toArray();
        return $this->view('edit', [
            'post' => $post,
            'categories' => $categories,
            'postCategories' => $postCategories
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $update = $post->fill([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'status' => $request->get('status')
        ]);

        $update->cover_image = $this->storePicture($request,$post);

        if($request->has('categories')){

            $post->categories()->delete();

            /**  Saving categories  */
            $categoryModels = collect();
            collect((array)$request->get('categories'))->each(function ($category) use ($categoryModels, $post) {
                $categoryModels->push($this->blogCategory->make([
                    'post_id' => $post->id,
                    'category_id' => $category,
                ]));
            });
            $post->categories()->saveMany($categoryModels);
        }

        $update->save();

        return redirect()->route('panel.posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * @param DeleteRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DeleteRequest $request, Post $post)
    {
        $post->categories()->delete();
        if($post->cover_image && file_exists($post->cover_image))
            unlink($post->cover_image);

        $post->delete();

        return redirect()->route('panel.posts.index')->with('success', 'Post deleted successfully');
    }
}
