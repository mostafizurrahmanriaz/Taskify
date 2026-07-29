<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if($user){
            if($user->role === 'provider'){
                return redirect()->route('provider.dashboard');
            }elseif($user->role === 'user'){
                return redirect()->route('user.dashboard');
            }else{
            return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}
