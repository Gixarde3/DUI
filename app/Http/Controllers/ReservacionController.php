<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Habitacion;
use App\Models\Usuario;
class ReservacionController extends Controller
{
    //
    public function crear_reservacion(Request $request){
        $usuario = Usuario::where('sesion', $request->sesion)->first();
        $habitaciones = Reservacion::where('habitacion_id', $request->habitacion_id)->whereBetween('fecha_inicio', [$request->fecha_inicio, $request->fecha_fin])->whereBetween('fecha_fin', [$request->fecha_inicio, $request->fecha_fin])->get();
        $infoHabitacion = Habitacion::find($request->habitacion_id);
        

        if(count($habitaciones) >= $infoHabitacion->cantidad){
            return response()->json([
                'success' => false,
                'message' => 'La habitación ya está reservada',
                'habitacion' => $infoHabitacion
            ]);
        }
        $reservacion = new Reservacion();
        $reservacion->fecha_inicio = $request->fecha_inicio;
        $reservacion->fecha_fin = $request->fecha_fin;
        $reservacion->usuario_id = $usuario->id;
        $reservacion->habitacion_id = $request->habitacion_id;
        $reservacion->save();
        return response()->json([
            'success' => true,
            'message' => 'Reservación creada con éxito',
            'fechas' => $request
        ]);
    }
    public function editar_reservacion(Request $request, $id){
        $habitaciones = Reservacion::where('habitacion_id', $request->habitacion_id)->where('fecha_inicio', $request->fecha_inicio)->where('fecha_fin', $request->fecha_fin)->get();
        $infoHabitacion = Habitacion::find($request->habitacion_id);
        if(count($habitaciones) >= $infoHabitacion->cantidad){
            return response()->json([
                'success' => false,
                'message' => 'La habitación ya está reservada en esa fecha',
            ]);
        }
        $reservacion = Reservacion::find($id);
        $reservacion->fecha_inicio = $request->fecha_inicio;
        $reservacion->fecha_fin = $request->fecha_fin;
        $reservacion->save();
        return response()->json([
            'success' => true,
            'message' => 'Reservación editada con éxito',
        ]);
    }
    public function eliminar_reservacion($id){
        $reservacion = Reservacion::find($id);
        $reservacion->delete();
        return response()->json([
            'success' => true,
            'message' => 'Reservación eliminada con éxito',
        ]);
    }
    public function obtener_reservaciones(){
        $reservaciones = Reservacion::all();
        return response()->json([
            'success' => true,
            'reservaciones' => $reservaciones,
            'message' => 'Reservaciones obtenidas con éxito'
        ]);
    }
    public function obtener_reservacion($id){
        $reservacion = Reservacion::find($id);
        return response()->json([
            'success' => true,
            'reservacion' => $reservacion,
            'message' => 'Reservación obtenida con éxito'
        ]);
    }
    public function obtener_reservaciones_habitacion($id){
        $reservaciones = Reservacion::where('habitacion_id', $id)->get();
        $reservaciones_salida = [];
        foreach($reservaciones as $reservacion){
            $reservacion_salida = [];
            $reservacion_salida['id'] = $reservacion->id;
            $reservacion_salida['fecha_inicio'] = $reservacion->fecha_inicio;
            $reservacion_salida['fecha_fin'] = $reservacion->fecha_fin;
            $reservacion_salida['usuario'] = Usuario::find($reservacion->usuario_id);
            $reservacion_salida['habitacion'] = Habitacion::find($reservacion->habitacion_id);
            array_push($reservaciones_salida, $reservacion_salida);
        }
        return response()->json([
            'success' => true,
            'reservaciones' => $reservaciones_salida,
            'message' => 'Reservaciones obtenidas con éxito'
        ]);
    }
}
