<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AsistenciaController extends Controller
{

    public function index(Request $request)
    {
        
        //return $results = DB::select('call genero_select();');
        if($request->ajax()){
            return $results = DB::select('call select_asistencia(?);', [ $request->id ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }

    public function rut(Request $request)
    {
        
        //return $results = DB::select('call genero_select();');
        if($request->ajax()){
            return $results = DB::select('call select_asistencia_rut( ? );', [ $request->rut ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }

    public function destroy($id)
    {
        try {
            return $result = DB::select("call delete_asistencia( ? );", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    public function store(Request $request)
    {
        try {
            return $result = DB::select("call insert_asistencia( ?, ?, ?, ?, ?, ? );", [ $request->id_empleado , $request->id_contrato, $request->dias, $request->horas, $request->id_periodo, $request->mes_periodo ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call update_asistencia( ?, ?, ? );", [ $id, $request->dias, $request->horas ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
