<?php

namespace App\Http\Controllers\Panel;

use App\Models\Category;
use App\Http\Controllers\BasePanelController;
use App\Http\Requests\Panel\Category\DeleteRequest;
use App\Http\Requests\Panel\Category\IndexRequest;
use App\Http\Requests\Panel\Category\CreateRequest;
use App\Http\Requests\Panel\Category\EditRequest;
use App\Http\Requests\Panel\Category\StoreRequest;
use App\Http\Requests\Panel\Category\UpdateRequest;
use App\Http\Requests\Panel\Category\ShowRequest;
use function turkish_slug;

class CategoryController extends BasePanelController
{
    /** @var Category */
    protected $category;

    public function __construct(Category $category)
    {
        $this->view_path = 'category';
        $this->category = $category;
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(IndexRequest $request)
    {
        $categories = $this->category->paginate(10);
        return $this->view('home', [
            'categories' => $categories
        ]);
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CreateRequest $request)
    {
        return $this->view('create');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $this->category->create([
            'title' => $request->get('title'),
            'slug' => turkish_slug($request->get('title'))
        ]);

        return redirect()->route('panel.categories.index')->with('success', 'Created succesfully');
    }

    /**
     * @param ShowRequest $request
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ShowRequest $request, Category $category)
    {
        return $this->view('show',[
            'category' => $category
        ]);
    }

    /**
     * @param EditRequest $request
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditRequest $request, Category $category)
    {
        return $this->view('edit',[
            'category' => $category
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $category->title = $request->get('title');
        $category->save();

        return redirect()->route('panel.categories.show',$category)->with('success', 'Updated succesfully');
    }

    /**
     * @param DeleteRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DeleteRequest $request, Category $category)
    {
        $category->delete();
        return redirect()->route('panel.categories.index')->with('success', 'Deleted succesfully');
    }
}
