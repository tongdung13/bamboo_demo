<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('login')){
            if (Auth::user()->level == 'User') {
                return redirect()->route('frontend.home')->with('message', 'Bạn đã đăng nhập thành công');
            }
        }

        return $next($request);
    }
}
