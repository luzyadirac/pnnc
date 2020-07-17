<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\solicitud;
use app\proceso;
use App\dependencia;

class solicitudcontroller extends Controller
{
    public function crearSolicitud(){
        $areasP = DB::table('dependencias')
                    ->orderBy('id_dep')                    
                    ->get();

        return view('gco.Gcdp.crearSolicitud', array(
            'areasP'=>$areasP
        ));
    }

    public function guardarSolicitud(Request $request){
    	//validar formulario
    	$validaInfo = $this->validate($request, [
    	'objeto' => 'required',
    	'fuente' => 'required|not_in:0',
    	'valor' => 'required',
    	'Numero_solicitud' => 'required|min:4|unique:solicitudes,N_solCDP',
    	'dependencia' => 'required|not_in:0'
    	]);

    	$sol = new solicitud();
    	$user = \Auth::user();

    	

    	$sol->N_solCDP=  $request->input('Numero_solicitud');
    	$sol->objeto =  $request->input('objeto');
    	$sol->valor = $request->input('valor');
    	$sol->fuente = $request->input('fuente');
    	$sol->n_radicado = $request->input('exp');
    	$sol->comentarios = $request->input('comentarios');
    	$sol->cod_dep = $request->input('dependencia');
        $sol->estado = 1;
    	$sol->save();

    	return redirect()->route('gestionarCdp')->with(array(
    		'message' => 'La solicitud se creó correctamente!!'
    	)); 

    }
}





