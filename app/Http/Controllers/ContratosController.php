<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContratosController extends Controller
{

    public function index(Request $request)
    {    
        if($request->ajax()){
            return $results = DB::select('call empl_cont_select(?);', [ $request->id ]);

        }else{

            return redirect()->route('home');
        }
    }

    public function store(Request $request)
    {
        try {
            return $result = DB::select("call contrato_insert( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );", 
                            [ $request->idemp, $request->empresa, $request->renta, $request->v_hora, $request->id_plazocontrato,
                              $request->desde, $request->hasta, $request->colacion, $request->movilizacion, $request->vacaciones,
                              $request->domicilio_laboral, $request->afp, $request->salud, $request->cesantia, $request->caja, $request->medio_pago,
                              $request->banco, $request->tipo_cuenta, $request->nr_cuenta ]);
            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }    

    
}
