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
        // Recoger los datos del usuario por post
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        $params_array['password'] = hash('sha256', $params_array['password']);
        
        $usuario = User::create($params_array);

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

        $json = $request->json;
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validate = \Validator::make($params_array, [
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse('Error al validar los datos', 400);
        }

        if (isset($params->name)) {
            $user->name = $params->name;
        }

        if (isset($params->email)) {
            $user->email = $params->email;
        }

        if (isset($params->phone)) {
            $user->phone = $params->phone;
        }

        if (isset($params->password)) {
            $user->password = hash('sha256', $params->password);
        }

        if (isset($params->role)) {
            $user->role = $params->role;
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
