<?php

namespace App\Http\Middleware;

use Closure;

class Checksession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->session()->get('userID');
        if ($id=='')
        {
            return redirect('auto');
        }
        return $next($request);
    }
}
