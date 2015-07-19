<?php

namespace App\Http\Middleware;

use App\Http\Requests\TaskRequest;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

class Permissions
{
    protected $auth;

    protected $user;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $parameters = Route::current()->parameters();
        $this->user =  isset($parameters['users']) ? $parameters['users'] : null;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        switch( $request->route()->getName() ) {
            case 'users.create':
            case 'users.store':
            case 'users.destroy':
                if ( ! $this->auth->user()->is_admin ) {
                    return new RedirectResponse( url('/users') );
                }
                break;
            case 'users.edit':
            case 'users.update':
                if ( ! $this->auth->user()->is_admin && $this->auth->user()->id != $this->user->id ) {
                    return new RedirectResponse( url('/users') );
                }
                break;
            case 'clients.create':
            case 'clients.edit':
            case 'clients.destroy':
                if ( ! $this->auth->user()->is_admin ) {
                    return new RedirectResponse( url('/clients') );
                }
                break;
            case 'projects.create':
            case 'projects.edit':
            case 'projects.destroy':
                if ( ! $this->auth->user()->is_admin ) {
                    return new RedirectResponse( url('/projects') );
                }
                break;
            case 'tasks.create':
                if ( ! $this->auth->user()->is_admin ) {
                    return new RedirectResponse( url('/tasks') );
                }
                break;
            case 'tasks.edit':
            case 'tasks.store':
            case 'tasks.delete':
                $taskRequest = new TaskRequest();
                if ( ! $taskRequest->authorize() ) {
                    session()->flash('flash_message', 'Sem permissão para acessar este recurso');
                    return new RedirectResponse( url('/tasks') );
                }
                break;
        }

        return $next($request);
    }
}
