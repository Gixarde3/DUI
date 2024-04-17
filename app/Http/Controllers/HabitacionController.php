<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    //
    public function crear_habitacion(Request $request){
        $habitacion = new Habitacion();
        $habitacion->titulo = $request->titulo;
        $habitacion->descripcion = $request->descripcion;
        $habitacion->cantidad = $request->cantidad;
        $habitacion->precio = $request->precio;
        $habitacion->imagen = FileController::manejarArchivo($request->file('imagen'));
        $habitacion->save();
        return response()->json([
            'success' => true,
            'message' => 'Habitación creada con éxito',
        ]);
    }
    public function editar_habitacion(Request $request, $id){
        $habitacion = Habitacion::find($id);
        $habitacion->titulo = $request->titulo;
        $habitacion->descripcion = $request->descripcion;
        $habitacion->cantidad = $request->cantidad;
        $habitacion->precio = $request->precio;
        if($request->hasFile('imagen')){
            $image = $request->file('imagen');
            FileController::deleteFile($habitacion->imagen);
            $habitacion->imagen = FileController::manejarArchivo($image, 'habitaciones');
        }
        $habitacion->save();
        return response()->json([
            'success' => true,
            'message' => 'Habitación editada con éxito',
        ]);
    }
    public function eliminar_habitacion($id){
        $habitacion = Habitacion::find($id);
        FileController::deleteFile($habitacion->imagen);
        $habitacion->delete();
        return response()->json([
            'success' => true,
            'message' => 'Habitación eliminada con éxito',
        ]);
    }
    public function obtener_habitaciones(){
        $habitaciones = Habitacion::all();
        return response()->json([
            'success' => true,
            'habitaciones' => $habitaciones,
            'message' => 'Habitaciones obtenidas con éxito'
        ]);
    }
    public function obtener_habitacion($id){
        $habitacion = Habitacion::find($id);
        return response()->json([
            'success' => true,
            'habitacion' => $habitacion,
            'message' => 'Habitación obtenida con éxito'
        ]);
    }
}
