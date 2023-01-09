<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HaberesDinamicosController extends Controller
{

    public function index(Request $request)
    {
        
          if($request->ajax()){
            return $results = DB::select('call haberesdinamicos_select( ? );', [ $request->id ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }    

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call haberesdinamicos_insert( ?, ?, ?, ?, ? );", [ $request->id_empleado, $request->haber_val, $request->periodos_val, $request->todos_val, $request->valor ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }    

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call haberesdinamicos_update( ?, ?, ?, ?, ?, ? );", [ $id, $request->idempleado, $request->idhaberes, $request->periodo, $request->todosp, $request->valor ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function destroy($id)
    {
        try {
            return $result = DB::select("call haberesdinamicos_delete( ? );", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
