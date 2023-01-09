<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PeriodoController extends Controller
{

    public function index(Request $request)
    {
        
          if($request->ajax()){
            return $results = DB::select('call select_periodo( ? );', [ $request->id ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }    

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call insert_periodo( ?, ?, ? );", [ $request->nombre, $request->mes, $request->obs ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }    

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call update_periodo( ?, ?, ?, ? );", [ $id, $request->nombre, $request->mes, $request->obs ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function destroy($id)
    {
        try {
            return $result = DB::select("call delete_periodo( ? );", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
