<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user->role == 'Admin') {
               return redirect()->route('AdminPanel');
        }else if($user->role == 'User') {
               return redirect()->route('UserPanel');
        }

        return $next($request);
    }
}
