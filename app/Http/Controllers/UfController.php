<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UfController extends Controller
{
    
    public function index(Request $request)
    {
        
        if($request->ajax()){
            return $results = DB::select('call uf_select(?);', [ $request->id ]);
        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }    

    public function api(Request $request)
    {

           $apiUrl = 'https://mindicador.cl/api/uf/'.$request->inicio;
   
            if ( ini_get('allow_url_fopen') ) {
                $json = file_get_contents($apiUrl);
                return json_encode($json);
            } 

    }    

    public function uf_m(Request $request)
    {
        try {
            $origen = auth()->user()->nombre;
            $nombre = 'Unidad de fomento (UF)';
            $unidad = 'Pesos';
            return $result = DB::select("call uf_insert( ?, ?, ?, ?, ?, ? );", [ $origen, $nombre, $unidad, $request->fecha, $request->valor, '2' ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call uf_insert( ?, ?, ?, ?, ?, ? );", [$request->origen, $request->nombre, $request->unidad_medida, $request->fecha, $request->valor, $request->opcion]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
