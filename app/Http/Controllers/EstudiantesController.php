<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Estudiante::all();
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
        $estudiante = Estudiante::create($inputs);

        return response()->json([
            'data' => $estudiante,
            'mensaje' => "Guardado con exito",
        ]);
    }
    /**
     * Display the specified resource.
     */
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
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            $estudiante->nombres = $request->nombres;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->telefono = $request->telefono;
            $estudiante->direccion = $request->direccion;
            $estudiante->ciudad = $request->ciudad;
            $estudiante->semestre = $request->semestre;
            $estudiante->credito = $request->credito;
            $estudiante->nota = $request->nota;
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

    /**
     * Remove the specified resource from storage.
     */
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
