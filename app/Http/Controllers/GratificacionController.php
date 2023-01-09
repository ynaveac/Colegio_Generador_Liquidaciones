<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GratificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //return $results = DB::select('call genero_select();');
        if($request->ajax()){
            return $results = DB::select('call gratificacion_select(?);', [ $request->id ]);
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
            return $result = DB::select("call gratificacion_insert( ?, ?, ?, ?, ?, ? );", [ $request->porcentaje, $request->tope, 
                                                                                            $request->sueldo_m, $request->inicio, 
                                                                                            $request->termino, $request->descripcion ]);
            
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
            $result = DB::select("call gratificacion_update( ?, ?, ?, ?, ?, ?, ? );", [$id, $request->porcentaje, $request->tope, 
                                                                                $request->sueldo_m, $request->inicio, 
                                                                                $request->termino, $request->descripcion ]);
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
            return $result = DB::select("call gratificacion_delete(?);", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
