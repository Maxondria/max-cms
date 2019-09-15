<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->isAdmin()) {
            session()->flash('error', 'YOU DO NOT HAVE RIGHTS TO THIS RESOURCE');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
