<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmpresasController extends Controller
{

    public function index(Request $request)
    {
        
          if($request->ajax()){
            return $results = DB::select('call empresas_select(?);', [ $request->id ]);

        }else{
            //return view('home');
            return redirect()->route('home');
        }

    }

    public function store(Request $request)
    {
        try {


            return $result = DB::select("call empresas_insert( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );", 
                                        [ 
                                        $request->rut, 
                                        $request->razon_social, 
                                        $request->rep_legal, 
                                        $request->rut_rep_legal,
                                        $request->giro,
                                        $request->direccion,
                                        $request->comuna,
                                        $request->ciudad,
                                        $request->fono,
                                        $request->caja_comp,
                                        $request->gratif  
                                        ]); 
                                    

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }    

    public function destroy($id)
    {
        try {
            return $result = DB::select("call empresas_delete(?);", [$id]);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $result = DB::select("call empresas_update( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? );", 
                                                        [   $id, 
                                                            $request->rut, 
                                                            $request->razon_social, 
                                                            $request->rep_legal, 
                                                            $request->rut_rep_legal,
                                                            $request->giro,
                                                            $request->direccion,
                                                            $request->comuna,
                                                            $request->ciudad,
                                                            $request->fono,
                                                            $request->caja_comp,
                                                            $request->gratif 
                                                        ]);
            return $result;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

}
