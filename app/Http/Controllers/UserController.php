<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function store(Request $request)
    {
        $inputs = $request->input();
        $inputs["password"] = Hash::make(trim($request->password));
        $user = User::create($inputs);

        return response()->json([
            'data' => $user,
            'mensaje' => "Usuario guardado con exito",
        ]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if (isset($user)) {
            return response()->json([
                'data' => $user,
                'mensaje' => "Usuario encontrado con exito.",
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el usuario.",
            ]);
        }
    }


    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                return response()->json([
                    'data' => $user,
                    'mensaje' => "Usuario actualizado con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "No se actualizo el usuario.",
                ]);
            };
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "No existe el usuario.",
            ]);
        };
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $res = User::destroy($id);
            if ($res) {
                return response()->json([
                    'data' => $user,
                    'mensaje' => "Usuario fue eliminado con exito.",
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => "Usuario no existe.",
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => "Error al eliminar Usuario.",
            ]);
        }
    }
}
