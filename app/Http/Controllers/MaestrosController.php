<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Maestro::all();
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
        $maestro = Maestro::create($inputs);

        return response()->json([
            'data' => $maestro,
            'mensaje' => "Maestro guardado con exito",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maestro = Maestro::find($id);
        if (isset($maestro)) {
            return response()->json([
                'data' => $maestro,
                'mensaje' => "Maestro encontrado con exito.",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el maestro.",
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
        $maestro = Maestro::find($id);
        if (isset($maestro)) {
            $maestro->nombres = $request->nombres;
            $maestro->apellidos = $request->apellidos;
            $maestro->email = $request->email;
            $maestro->telefono = $request->telefono;
            $maestro->direccion = $request->direccion;
            $maestro->ciudad = $request->ciudad;

            if ($maestro->save()) {
                return response()->json([
                    'data' => $maestro,
                    'mensaje' => "Maestro actualizado con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No existe el maestro.",
                ]);
            };
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el maestro.",
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maestro = Maestro::find($id);
        if (isset($maestro)) {
            $res = Maestro::destroy($id);
            if ($res) {
                return response()->json([
                    'data' => $maestro,
                    'mensaje' => "Maestro fue eliminado con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "Maestro no existe.",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "Error al eliminar maestro.",
            ]);
        }
    }
}
