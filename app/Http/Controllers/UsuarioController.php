<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
class UsuarioController extends Controller
{
    //
    public function iniciar_sesion(Request $request){
        $usuario = Usuario::where('username', $request->username)->first();
        if(!$usuario){
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 401);
        }
        if(!Hash::check($request->password, $usuario->password)){
            return response()->json([
                "success" => false,
                "message" => "Contraseña incorrecta"
            ], 401);
        }
        $usuario->sesion = Hash::make($usuario.date('m-d-Y h:i:s a', time()));
        $usuario->save();
        return response()->json([
            'success' => true,
            "message" => "Sesión iniciada",
            "sesion" => $usuario->sesion,
            "tipoUsuario" => $usuario->tipoUsuario,
            "username" => $usuario->username
        ], 200);
    }

    public function crear_usuario(Request $request){
        $usuarioInvalido = Usuario::where('username', $request->username)->first();
        if($usuarioInvalido){
            return response()->json([
                "success" => false,
                "message" => "Usuario ya existe"
            ], 400);
        }
        $usuarioInvalido = Usuario::where('email', $request->email)->first();
        if($usuarioInvalido){
            return response()->json([
                "success" => false,
                "message" => "Email ya existe"
            ], 400);
        }
        $usuario = new Usuario();
        $usuario->username = $request->username;
        $usuario->password = $request->password;
        $usuario->email = $request->email;
        $usuario->tipoUsuario = 1;
        $usuario->save();
        return response()->json([
            "success" => true,
            "message" => "Usuario creado"
        ], 201);
    }
    public function editar_usuario(Request $request, $id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }
        $usuarioInvalido = Usuario::where('username', $request->username)->where('_id' , '!=', $id)->first();
        if($usuarioInvalido){
            return response()->json([
                "success" => false,
                "message" => "Usuario ya existe"
            ], 400);
        }
        $usuarioInvalido = Usuario::where('email', $request->email)->where('_id' , '!=', $id)->first();
        if($usuarioInvalido){
            return response()->json([
                "success" => true,
                "message" => "Email ya existe"
            ], 400);
        }
        $usuario->username = $request->username;
        $usuario->password = $request->password;
        $usuario->email = $request->email;
        $usuario->tipoUsuario = $request->tipoUsuario;
        $usuario->save();
        return response()->json([
            "success" => true,
            "message" => "Usuario editado"
        ], 200);
    }
    public function eliminar_usuario($id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }
        $usuario->delete();
        return response()->json([
            "success" => true,
            "message" => "Usuario eliminado"
        ], 200);
    }
    public function obtener_usuarios(){
        $usuarios = Usuario::all();
        return response()->json([
            "success" => true,
            "usuarios"=>$usuarios
        ], 200);
    }
    public function obtener_usuario($id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ], 404);
        }
        return response()->json(
            [
                "success" => true,
                "usuario"=>$usuario
            ], 200);
    }
    public function cambiar_rol(Request $request, $id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json([
                "success" => false,
                "message" => "Usuario no encontrado"
            ]);
        }
        $nuevoRol = $usuario->tipoUsuario == "2" ? "1" : "2";
        $usuario->tipoUsuario = $nuevoRol;
        $usuario->save();
        return response()->json([
            "success" => true,
            "message" => "Cambio de rol exitoso"
        ]);
    }
}
