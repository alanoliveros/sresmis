<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class isParent
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
        if(Auth::check()){
            if(auth()->user()->role == 4){
                return $next($request);
            }
            if(auth()->user()->role == 1){
                return to_route('sresmis.admin.dashboard');
            }
            if(auth()->user()->role == 2){
                return to_route('sresmis.teacher.dashboard');
            }
            if(auth()->user()->role == 3){
                return to_route('sresmis.student.dashboard');
            }
            if(auth()->user()->role == 0){
               Auth::logout();
               return redirect('/login');
            }
        }
    }
}
