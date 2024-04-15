<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sugerencia;

class SugerenciaController extends Controller
{
    //
    public function crear_sugerencia(Request $request){
        $sugerencia = new Sugerencia();
        $sugerencia->titulo = $request->titulo;
        $sugerencia->descripcion = $request->descripcion;
        $sugerencia->save();
        return response()->json([
            'success' => true,
            'message' => 'Sugerencia creada con éxito',
        ]);
    }
    public function editar_sugerencia(Request $request, $id){
        $sugerencia = Sugerencia::find($id);
        $sugerencia->titulo = $request->titulo;
        $sugerencia->descripcion = $request->descripcion;
        $sugerencia->save();
        return response()->json([
            'success' => true,
            'message' => 'Sugerencia editada con éxito',
        ]);
    }
    public function eliminar_sugerencia($id){
        $sugerencia = Sugerencia::find($id);
        $sugerencia->delete();
        return response()->json([
            'success' => true,
            'message' => 'Sugerencia eliminada con éxito',
        ]);
    }
    public function obtener_sugerencias(){
        $sugerencias = Sugerencia::all();
        return response()->json([
            'success' => true,
            'sugerencias' => $sugerencias,
            'message' => 'Sugerencias obtenidas con éxito'
        ]);
    }
    public function obtener_sugerencia($id){
        $sugerencia = Sugerencia::find($id);
        return response()->json([
            'success' => true,
            'sugerencia' => $sugerencia,
            'message' => 'Sugerencia obtenida con éxito'
        ]);
    }
}
