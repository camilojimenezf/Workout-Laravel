<?php

namespace App\Http\Controllers;

use App\Helpers\JwtAuth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function login(Request $request) {
        $jwtAuth = new JwtAuth();
        
        //Recibir POST
        $json = $request->json;
        $params = json_decode($json);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $getToken = (!is_null($json) && isset($params->getToken)) ? $params->getToken : null;

        //Cifrar la password
        $pwd = hash('sha256', $password);

        if (!is_null($email) && !is_null($password)) {
            $signup = $jwtAuth->signup($email, $pwd, $getToken);
            return response()->json($signup, 200);      
        } else {
            return response()->json( array(
                'status' => 'error',
                'message' => 'Envia tus datos por post'
            ), 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recoger POST
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'role' => 'in:'. User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_ATHLETE . ',' . User::USUARIO_TRAINER,
        ];

        $this->validate($request, $rules);
        $campos = $request->all();
        $campos['password'] = hash('sha256', $request->password);
        
        $usuario = User::create($campos);

        return $this->showOne($usuario, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //throw new \Illuminate\Auth\AuthenticationException('Error message');
        $usuario = User::findOrFail($id);
        return $this->showOne($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'min:6',
            'role' => 'in:'. User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_ATHLETE . ',' . User::USUARIO_TRAINER,
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        if ($request->has('password')) {
            $user->password = hash('sha256', $request->password);
        }

        if ($request->has('role')) {
            $user->role = $request->role;
        }

        if (!$user->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        } 

        $user->save();

        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $this->showOne($user);
    }
}
