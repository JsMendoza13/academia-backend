<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;

class MaestrosController extends Controller
{

    public function index()
    {
        return Maestro::all();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $inputs = $request->input();
        $maestro = Maestro::create($inputs);

        return response()->json([
            'data' => $maestro,
            'mensaje' => "Maestro guardado con exito",
        ]);
    }

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


    public function edit(string $id)
    {
        //
    }


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
            $maestro->id_materias = $request->id_materias;

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
