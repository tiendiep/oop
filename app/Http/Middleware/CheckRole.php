<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Xử lý yêu cầu vào.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
   
        $user = Auth::user();

        
        if (!in_array($user->role, $roles)) {
            
            return response()->json(['error' => 'Forbidden'], 403);
        }

        
        return $next($request);
    }
}

