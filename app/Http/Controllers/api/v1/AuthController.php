<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    # FUNCION PARA INICIAR SESSION (LOGIN)
    public function login(Request $request)
    {
        # VALIDAMOS LAS CREDENCIALES DEL USUARIO
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        # OBTENEMOS EL TOKEN
        $token = auth('api')->attempt($credenciales);

        # VALIDACION POR SI LAS CREDENCIALES SON INCORRECTAS
        if(!$token){
            return response()->json([
                'error' => '[SYSTEM]: Credenciales Incorrectas.'
            ], 401);
        }

        # SI ESTA TODO CORRECTO RETORNAMOS EL TOKEN Y EL USUARIO
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ], 200);
    }

    # FUNCION PARA REGISTRAR UN USUARIO
    public function register(Request $request)
    {
        # VALIDAMOS LA INFORMACION QUE NOS LLEGA
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|string|confirmed'
        ]);

        # CREAMOS EL USUARIO 
        $user = User::create($data);

        # OBTENEMOS EL TOKEN Y INICIAMOS LA SESSION
        $token = auth('api')->login($user);

        # SI TODO ESTA CORRECTO RETORNAMOS UN 201
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $user,
        ], 201);
    }

    # FUNCION PARA QUE UN USUARIO PUEDA VER SU PERFIl
}
