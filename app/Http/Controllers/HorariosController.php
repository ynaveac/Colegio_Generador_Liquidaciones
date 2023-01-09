<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HorariosController extends Controller
{

    public function index(Request $request)
    {
        
        //return $results = DB::select('call genero_select();');
        if($request->ajax()){
            return $results = DB::select('call horario_select(?);', [ $request->id ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call horario_insert( ?, ?, ?, ? );", [ $request->nombre, $request->descripcion, $request->tipo, $request->horas ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call horario_update( ?, ?, ?, ?, ? );", [ $id, $request->nombre, $request->descripcion, $request->tipo, $request->horas ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function destroy($id)
    {
        try {
            return $result = DB::select("call horario_delete(?);", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
