<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HaberesController extends Controller
{
    
    public function index(Request $request)
    {

        if($request->ajax()){
            return $results = DB::select('call haberes_select( ? );', [ $request->id ]);
        }else{
            return redirect()->route('home');
        }

    }

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call haberes_insert( ?, ?, ?, ?, ? ,? );", [ $request->glosa, $request->tipo, $request->cabeceras, $request->imponible, $request->fijo, $request->estado  ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function destroy($id)
    {
        try {
            return $result = DB::select("call haberes_delete(?);", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call haberes_update( ?, ?, ?, ?, ? ,?, ? );", [ $id, $request->glosa, $request->tipo, $request->cabeceras, $request->imponible, $request->fijo, $request->estado ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
