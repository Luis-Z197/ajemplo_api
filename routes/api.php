<?php

use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::resources([
//     '/estudiantes' => EstudiantesController::class,
// ]);

//recurso tarea
Route::get('/tareas', [TareaController::class, 'index']);
Route::get('/tareas/{id}', [TareaController::class, 'show']);
Route::post('/tareas', [TareaController::class, 'store']);
Route::post('/test', [TareaController::class, 'validar']);
Route::put('/tareas/{id}', [TareaController::class, 'update']);
Route::delete('/tareas/{id}', [TareaController::class, 'destroy']);

// Route::get('/tareas', function (Request $request){
//     echo "hola";
// });


//recurso estudiantes
Route::get('/estudiantes', [EstudiantesController::class, 'index']);
Route::get('/estudiante/{id}', [EstudiantesController::class, 'getEstudiante']);
Route::post('/estudiantes/crear', [EstudiantesController::class, 'store']);
Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update']);
Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'eliminar']);





Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
