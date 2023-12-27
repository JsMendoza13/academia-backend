<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Inertia\Inertia;


class MateriasController extends Controller
{
    public function index()
    {
        return Materia::all();
    }

    function create()
    {
        //
    }


    public function store(Request $request)
    {
        $inputs = $request->input();
        $materias = Materia::create($inputs);

        return response()->json([
            'data' => $materias,
            'mensaje' => "Materia guardada con exito",
        ]);
    }


    public function show(string $id)
    {
        $materias = Materia::find($id);
        if (isset($materias)) {
            return response()->json([
                'data' =>  $materias,
                'mensaje' => "Materia encontrada con exito.",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "Materia no existe.",
            ]);
        }
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $materias = Materia::find($id);
        if (isset($materias)) {
            $materias->nombre = $request->nombre;
            $materias->descripcion = $request->descripcion;
            $materias->credito = $request->credito;
            $materias->horas = $request->horas;
            $materias->areaConocimiento = $request->areaConocimiento;
            $materias->electiva = $request->electiva;
            if ($materias->save()) {
                return response()->json([
                    'data' => $materias,
                    'mensaje' => "Materia actualizada con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No se actualizo la materia.",
                ]);
            };
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe la materia.",
            ]);
        };
    }


    public function destroy(string $id)
    {
        $materias = Materia::find($id);
        if (isset($materias)) {
            $res = Materia::destroy($id);
            if ($res) {
                return response()->json([
                    'data' => $materias,
                    'mensaje' => "La materia fue eliminada con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "materia no existe.",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "Error al eliminar materia.",
            ]);
        }
    }
}
