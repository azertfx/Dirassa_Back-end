<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Users
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $users;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $users)
    {
        $this->users = $users;
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
        if ($this->users->guest()) {
            return redirect('dirassaloginadmin');
        }elseif ($this->users->user()->level != 'user') {
            return redirect('dirassaloginadmin');
        }
        return $next($request);
    }
}
