<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

// Models
use App\Models\User;
use App\Models\Rol;

class AuthController extends Controller
{
    public function login_view() {
        return view('auth.login');
    }

    public function login_auth(Request $request) {
        $user = User::getUserByUsername($request->get('user'));

        if(!empty($user)) {
            if(Hash::check($request->get('password'), $user->usu_cla)) {
                $userRol = Rol::select('*')->where('rol_id', '=', $user->rol_id)->first();

                $request->session()->put([
                    'user_session' => [
                        'username' => $user->usu_nom,
                        'rolId' => $user->rol_id,
                        'id' => $user->usu_id,
                        'rol' => $userRol->rol_nom,
                    ],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Bienvenido',
                ]);

            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Contraseña incorrecta',
                ]);
            }
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Usuario incorrecto',
            ]);
        }
    }

    public function logout(Request $request){
        $request->session()->flush();

        return redirect()->route('login');
    }
}
