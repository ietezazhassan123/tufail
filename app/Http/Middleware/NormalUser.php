<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NormalUser
{
    
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
            
        if($user->role != 'User') {
               return redirect()->route('login');
        }
        return $next($request);
    }
}
