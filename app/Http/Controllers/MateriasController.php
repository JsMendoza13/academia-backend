<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Materia::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $materias = Materia::create($inputs);

        return response()->json([
            'data' => $materias,
            'mensaje' => "Materia guardada con exito",
        ]);
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materias = Materia::find($id);
        if (isset($materias)) {
            $materias->nombre = $request->nombre;
            $materias->descripcion = $request->descripcion;
            $materias->credito = $request->credito;
            $materias->horas = $request->horas;
            $materias->areaConocimiento = $request->areaConocimiento;
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

    /**
     * Remove the specified resource from storage.
     */
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
