<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class EstudiantesController extends Controller
{

    public function index()
    {


        return Estudiante::all();
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        $inputs = $request->input();
        $estudiante = Estudiante::create($inputs);

        return response()->json([
            'data' => $estudiante,
            'mensaje' => "Guardado con exito",
        ]);
    }

    public function show(string $id)
    {
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            return response()->json([
                'data' => $estudiante,
                'mensaje' => "Estudiante encontrado con exito.",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el estudiante.",
            ]);
        }
    }


    public function edit(string $id)
    {
    }


    public function update(Request $request, string $id)
    {
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            $estudiante->nombres = $request->nombres;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->telefono = $request->telefono;
            $estudiante->direccion = $request->direccion;
            $estudiante->ciudad = $request->ciudad;
            $estudiante->semestre = $request->semestre;
            $estudiante->nota = $request->nota;
            $estudiante->id_materias = $request->id_materias;
            if ($estudiante->save()) {
                return response()->json([
                    'data' => $estudiante,
                    'mensaje' => "Estudiante actualizado con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No se actualizo el estudiante.",
                ]);
            };
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el estudiante.",
            ]);
        };
    }


    public function destroy(string $id)
    {
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            $res = Estudiante::destroy($id);
            if ($res) {
                return response()->json([
                    'data' => $estudiante,
                    'mensaje' => "Estudiante fue eliminado con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "Estudiante no existe.",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "Error al eliminar estudiante.",
            ]);
        }
    }
}
