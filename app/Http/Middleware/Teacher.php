<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_priority = auth()->user()->priority;

        if(!in_array($user_priority, [\App\Models\User::USER_PRIORITY['teacher'], \App\Models\User::USER_PRIORITY['admin']])){
            return redirect()->route("login");
        }
        return $next($request);
    }
}
