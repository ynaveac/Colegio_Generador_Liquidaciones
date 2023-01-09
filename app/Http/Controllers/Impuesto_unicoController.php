<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Impuesto_unicoController extends Controller
{
    
    public function index(Request $request)
    {
        
        //return $results = DB::select('call genero_select();');
        if($request->ajax()){
            return $results = DB::select('call impuesto_select(?);', [ $request->id ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call impuesto_insert( ?, ?, ?, ? );", [ $request->desde, $request->hasta, 
                                                                                $request->factor, $request->rebaja ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function destroy($id)
    {
        try {
            return $result = DB::select("call impuesto_delete(?);", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call impuesto_update( ?, ?, ?, ?, ? );", [$id, $request->desde, $request->hasta, 
                                                                                $request->factor, $request->rebaja ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
