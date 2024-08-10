<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use DateTime;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(){
        $estudiantes = Estudiante::all();
        return response()->json([
            "status"=>200,
            "data"=>$estudiantes,
        ]);
    }
    public function getEstudiante($id){
        $estudiante = Estudiante::find($id);
        return response()->json([
            "status"=>200,
            "data"=>$estudiante,
        ]);
    }
    public function store(Request $request){

        $estudiante = new Estudiante();
        $estudiante->ci = $request->ci;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->nombres = $request->nombres;
        $estudiante->direccion = $request->direccion;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->save();

        return response()->json([
            "status"=>201,
            "message"=>"Estudiante creado exitosamente",
            "data"=>$estudiante
        ]);
    }
    public function update(Request $request){

        $estudiante = Estudiante::find($request->id);
        $estudiante->ci = $request->ci;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->nombres = $request->nombres;
        $estudiante->direccion = $request->direccion;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->save();

        return response()->json([
            "status"=>201,
            "message"=>"Estudiante actualizado exitosamente",
            "data"=>$estudiante
        ]);
    }
    public function eliminar($id){
        $estudiante = Estudiante::find($id);
        $estudiante->delete();

        return response()->json([
            "status"=>200,
            "message"=>"Estudiante eliminado exitosamente",
        ]);
    }

}
