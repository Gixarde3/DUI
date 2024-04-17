<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Http\Controllers\FileController;
class ComidaController extends Controller
{
    //
    public function crear_platillo(Request $request){
        $newPlatillo = new Comida();
        $newPlatillo->titulo = $request->titulo;
        $newPlatillo->descripcion = $request->descripcion;
        $newPlatillo->precio = $request->precio;
        $newPlatillo->imagen = FileController::manejarArchivo($request->file('imagen'));
        $newPlatillo->save();
        return response()->json([
            'success' => true,
            'message' => 'Platillo creado correctamente',
            'platillo' => $newPlatillo
        ], 200);
    }
    public function editar_platillo(Request $request, $id){
        $platillo = Comida::find($id);
        $platillo->titulo = $request->titulo;
        $platillo->descripcion = $request->descripcion;
        $platillo->precio = $request->precio;
        if($request->hasFile('imagen')){
            FileController::deleteFile($platillo->imagen);
            $platillo->imagen = FileController::manejarArchivo($request->file('imagen'));
        }
        $platillo->save();
        return response()->json([
            'success' => true,
            'message' => 'Platillo editado correctamente',
            'platillo' => $platillo
        ], 200);
    }
    public function eliminar_platillo($id){
        $platillo = Comida::find($id);
        FileController::deleteFile($platillo->imagen);
        $platillo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Platillo eliminado correctamente'
        ], 200);
    }
    public function obtener_platillo($id){
        $platillo = Comida::find($id);
        return response()->json([
            'success' => true,
            'platillo' => $platillo
        ], 200);
    }
    public function obtener_platillos(){
        $platillos = Comida::all();
        return response()->json([
            'success' => true,
            'platillos' => $platillos
        ], 200);
    }
}
