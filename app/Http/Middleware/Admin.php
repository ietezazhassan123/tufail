<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class Admin
{
    
    public function handle($request, Closure $next)
    {
            $user = Auth::user();
            
            if($user->role != 'Admin') {
                   return redirect()->route('login');
            }
            return $next($request);
    }
}
