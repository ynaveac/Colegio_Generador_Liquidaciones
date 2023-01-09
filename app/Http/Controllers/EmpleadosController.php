<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
          if($request->ajax()){
            return $results = DB::select('call empleados_select(?);', [ $request->id ]);
/*
            $arrResultado = array();
            foreach ($results as $key => $value) {	                                            	
                $arrObjeto = array($value->id, $value->rut, $value->nombre, $value->apellido_p, $value->nm_cargo,); 
                array_push($arrResultado,$arrObjeto);
            }
            return json_encode($arrResultado);   
*/
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            return $result = DB::select("call empleados_insert( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );", 
                                        [ $request->rut, 
                                        $request->nombre, 
                                        $request->apellido_p, 
                                        $request->apellido_m,
                                        $request->fono,
                                        $request->direccion,
                                        $request->fecha_nacimiento,
                                        $request->idgenero,
                                        $request->idcargo,
                                        $request->iddepto,
                                        $request->idnacion,
                                        $request->idhorario ]); 
                                    

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
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
        try {
            $result = DB::select("call empleados_update( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );", 
                                                        [ $id, 
                                                        $request->rut, 
                                                        $request->nombre, 
                                                        $request->apellido_p, 
                                                        $request->apellido_m,
                                                        $request->fono,
                                                        $request->direccion,
                                                        $request->fecha_nacimiento,
                                                        $request->idgenero,
                                                        $request->idcargo,
                                                        $request->iddepto,
                                                        $request->idnacion,
                                                        $request->idhorario ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return $result = DB::select("call empleados_delete(?);", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
