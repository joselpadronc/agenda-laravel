<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Utilities\CommonUtilities;

class AuthUser
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
        $session = $request->session()->get('user_session');

        if(!empty($session)){
            return $next($request);
        }

        if($request->ajax()){
            return response()->json([
                'success' => false,
                'msg' => 'Debes iniciar sesión.'
            ]);
        }else{
            return redirect()->route('login');
        }
    }
}
