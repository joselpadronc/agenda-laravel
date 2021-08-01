<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Utilities\CommonUtilities;

class AdminUser
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
        $session = session()->get('user_session');

        if($session['rol'] === 'Administrador') {
          return $next($request);
        }else {
          return redirect()->route('home');
        }
    }
}
