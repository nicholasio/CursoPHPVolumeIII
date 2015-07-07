<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

class AdminAuth
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
            case 'users.destroy':
                if ( ! $this->auth->user()->is_admin ) {
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
        }

        return $next($request);
    }
}
