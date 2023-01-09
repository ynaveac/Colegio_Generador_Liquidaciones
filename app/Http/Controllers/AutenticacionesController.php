<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Auth;

class AutenticacionesController extends Controller
{
    public function iniciarSesion(LoginFormRequest $request)

    {

        // segmento login personlizado
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->clave], false)) {

            return  response()->json('Has iniciado sesión', 200 );
        }else{

            return  response()->json( ['errors' => ['login' => ['Los datos son incorrectos']]], 422 );

        }
        
        
    }

    public  function cerrarSesion()
    {
        Auth::logout();
        return redirect('/');
    }
}
