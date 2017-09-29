<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\BasePanelController as PanelController;
use App\Http\Requests\Panel\User\CreateRequest;
use App\Http\Requests\Panel\User\DeleteRequest;
use App\Http\Requests\Panel\User\EditRequest;
use App\Http\Requests\Panel\User\IndexRequest;
use App\Http\Requests\Panel\User\ShowRequest;
use App\Http\Requests\Panel\User\StoreRequest;
use App\Http\Requests\Panel\User\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use function redirect;

class UsersController extends PanelController
{

    /** @var User */
    protected $users;

    public function __construct(User $users)
    {
        $this->view_path = 'users';
        $this->users = $users;
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(IndexRequest $request)
    {
        $users = $this->users->paginate(10);
        return $this->view('home',[
            'users' => $users
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
        $this->users->create($request->intersect([
            'first_name',
            'last_name',
            'email',
            'password'
        ]));

        return redirect()->route('panel.users.index')->with('success','User created successfully');
    }

    /**
     * @param ShowRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ShowRequest $request, User $user)
    {
        return $this->view('show',[
            'user' => $user
        ]);
    }

    /**
     * @param EditRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EditRequest $request, User $user)
    {
        return $this->view('edit',[
            'user' => $user
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->fill($request->intersect([
            'first_name',
            'last_name',
            'email',
            'password'
        ]));

        $user->save();

        return redirect()->route('panel.users.index')->with('success','User updated successfully');
    }

    /**
     * @param DeleteRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DeleteRequest $request, User $user)
    {
        $user->delete();
        return redirect()->route('panel.users.index')->with('success','User deleted successfully');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archive(Request $request)
    {
        $users = $this->users->onlyTrashed()->paginate(10);
        return $this->view('archive', ['users' => $users]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request, $id)
    {
        User::withTrashed()->where('id','=', $id)->restore();

        return redirect()->route('panel.users.index')->with('success', 'User restored successfully');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request, $id)
    {
        $user = User::withTrashed()->where('id','=', $id)->first();
        $user->forceDelete();

        return redirect()->route('panel.users.archive')->with('success', 'User removed successfully');
    }
}
