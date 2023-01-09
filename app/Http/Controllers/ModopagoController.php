<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ModopagoController extends Controller
{

    public function index(Request $request)
    {
        
        //return $results = DB::select('call genero_select();');
        if($request->ajax()){
            return $results = DB::select('call modopago_select( ? );', [ $request->id ]);
        }else{

            return redirect()->route('home');
        }
        

    }    

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call modopago_insert( ? );", [ $request->nombre ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call modopago_update( ?, ? );", [ $id, $request->nombre ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }  

    public function destroy($id)
    {
        try {
            return $result = DB::select("call modopago_delete(?);", [ $id ]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
