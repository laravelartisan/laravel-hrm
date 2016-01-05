<?php

namespace Erp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Role
{

    protected $auth;


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($this->auth->check()) {

            if (!$request->user()->hasRole($role)){

                return redirect()->intended('employee');
            }
        }
        return $next($request);
    }
}
