<?php

namespace App\Http\Middleware;

use Closure;

class UserControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $idRole)
    {
        if (! $request->user()->hasRole($idRole)) {
            return redirect('index');
        }
        return $next($request);
    }
}
