<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct() {
        //$this->middleware( 'admin_auth' );
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::allOrSearch( 'name', $search )->paginate(10);

        return view('users.index', compact('users', 'search') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $userRequest
     * @return Response
     */
    public function store(UserRequest $userRequest)
    {
        $data = $userRequest->all();
        $data['password'] = bcrypt($data['password']);
        $user = new User( $data );

        $user->save();

        session()->flash('flash_message', 'Usuário Criado com sucesso');

        return redirect('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UserRequest $userRequest
     * @return Response
     * @internal param int $id
     */
    public function update(User $user, UserRequest $userRequest)
    {
        $data = ['name' => $userRequest->get('name'), 'is_admin' => $userRequest->get('is_admin') ];

        if ( ! Auth::user()->is_admin ) {
            unset($data['is_admin']);
        }

        $user->update( $data );

        session()->flash('flash_message', 'Usuário Atualizado com sucesso');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        if ( ( $user->projects->count() == 0  && $user->owner_projects->count() == 0 ) && $user->delete() ) {
            session()->flash('flash_message', 'Usuário removido com sucesso' );
        } else {
            session()->flash('flash_message', 'Impossível remover Usuário. Usuário tem projetos Associados');
        }

        return redirect('users');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit_password(User $user, PasswordRequest $request)
    {
        return view('users.password', compact('user') );
    }

    /**
     * @param User $user
     * @param PasswordRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function password(User $user, PasswordRequest $request)
    {
        $user->update( ['password' => bcrypt($request->get('password')) ]);

        session()->flash('flash_message', 'Senha alterada com sucesso');
        return redirect( route( 'users.edit', $user->id ) );
    }
}
