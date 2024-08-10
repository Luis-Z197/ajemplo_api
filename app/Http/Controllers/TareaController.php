<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    //validaciones
    public function validar(Request $request)
    {
        $reglas = array(
            'nombre' => 'required|min:5',
            'descripcion' => 'required',
        );
        $validator = Validator::make($request->all(), $reglas);
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "ms" => "Los datos ingresados son incorrectos"
            ]);
        }
        return true;
    }

    public function index()
    {
        //consultar tabla para listar filas
        $tareas = Tarea::all();
        return response()->json(
            [
                "status" => 200,
                "data" => $tareas
            ], 400
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //guadar datos en la base de datos
        $respuesta = $this->validar($request);
        if ($respuesta === true) {
            $tarea = Tarea::create($request->all());
            return response()->json(
                [
                    "status" => 201,
                    "message" => "Tarea creada exitosamente",
                    "data" => $tarea
                ]
            );
        }
        return $respuesta;
    }

    /**
     * Display the specified resource.
     */
    public function show($id_tarea)
    {
        //mostrar datos de una tarea
        $tarea = Tarea::find($id_tarea);
        if (!$tarea) {
            return response()->json(
                [
                    "status" => 404,
                    "message" => "Tarea no encontrada"
                ],
                404
            );
        }
        return response()->json(
            [
                "status" => 200,
                "message" => "Consulta exitosa",
                "data" => $tarea
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_tarea)
    {
        //función para actualizar una tarea
        $tarea = Tarea::find($id_tarea);
        if (!$tarea) {
            return response()->json(
                [
                    "status" => 404,
                    "message" => "Tarea no encontrada"
                ],
                404
            );
        }
        $tarea->update($request->all());
        return response()->json(
            [
                "status" => 200,
                "message" => "Tarea actualizada exitosamente",
                "data" => $tarea
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_tarea)
    {
        $tarea = Tarea::find($id_tarea);
        if (!$tarea) {
            return response()->json(
                [
                    "status" => 404,
                    "message" => "Tarea no encontrada"
                ],
                404
            );
        }
        return response()->json(
            [
                "status" => 200,
                "message" => "Consulta exitosa",
                "data" => $tarea
            ]
        );
    }
}
