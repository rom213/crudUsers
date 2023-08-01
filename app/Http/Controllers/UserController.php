<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return Response($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'contraseña' => 'required|min:8',
            'tipo_documento_id' => 'required|integer',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El email debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya ha sido registrado en la base de datos.',
            'contraseña.required' => 'El campo contraseña es obligatorio.',
            'contraseña.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'tipo_documento_id.required' => 'El campo tipo_documento_id es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $encryptedPassword = Hash::make($request->input('contraseña'));

        $userData = $request->all();
        $userData['contraseña'] = $encryptedPassword;

        $user = User::create($userData);
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Usuario creado satisfactoriamente',
                'user' => $user,
            ],
            200,
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            $idDocument = $user->tipo_documento_id;
            $TypeDocument = TypeDocument::findOrFail($idDocument);
            return response()->json(
                [
                    'status' => 'success',
                    'tipo_documento' => $TypeDocument->descripcion,
                    'user' => $user,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'usuario no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Usuario actualizado satisfactoriamente',
                    'user' => $user,
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'usuario no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Usuario Eliminado',
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'usuario no encontrado'], 404);
        }
    }
}
