<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\contrato;
use App\proceso;
use App\persona;
use App\pago;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function crearPago(){


        $consulta = contrato::all();

    	/*return view('gco.Gpago.crearPago',array(
                 'rta'=>$consulta
        ));*/

        return view('gco.Gpago.contratosPago',array(
            'rta'=>$consulta,
            'dat'=>null,
            'val'=>null,
            'search'=>null
        ));
    }


    public function crearPago2($search,$saldo){


        return view('gco.Gpago.crearPago',array(
                 'rta'=>$search,
                 'saldo'=>$saldo
        ));

    }
    public function guardarPago(Request $request){
    	//validar formulario
         $S = $request->input('saldo_contrato')-$request->input('valor_pagado');

    	$validaInfo = $this->validate($request, [
    	'fecha_pago' => 'required|unique:garantias,id_garantia',
    	'valor_pagado' => 'required',
    	'saldo' => 'required|numeric|size:'.$S,
    	'Contrato' => 'required|exists:contratos,id',
      	]);

    	$per = new pago();
    	$user = \Auth::user();

       

    	$per->f_pago=  $request->input('fecha_pago');
    	$per->valor_pago=  $request->input('valor_pagado');
    	$per->valor_saldo=  $request->input('saldo');
    	$per->cod_contrato=  $request->input('Contrato');
    	$per->observaciones=  $request->input('obs');
    	    	
    	$per->save();

    	return redirect()->route('gestionarPago')->with(array(
    		'message' => 'EL pago se creó correctamente!!'
    	)); 

    }

    public function buscarPago(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = pago::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
        return view('gco.Gpago.buscarPago', array(
            'resultado'=>$resultado
        ));
    }

    public function buscarConpago(Request $request){

        $validaInfo = $this->validate($request, [
        'Contrato' => 'required',
        ]);

        $consulta = contrato::all();
        $search=  $request->input('Contrato');
    
       /* $resultado = DB::table('contratos')
            ->join('pagos', 'contratos.id', '=', 'pagos.cod_contrato')
            ->select('procesos.num_proceso','procesos.modalidad','contratos.clase','contratos.valor_total','contratos.cod_dep')
            ->orderBy('procesos.modalidad', 'desc')
            ->get();
*/
        $resultado = pago::where('cod_contrato',$search)->get();
        $dato = contrato::where('id',$search)->first();

        return view('gco.Gpago.contratosPago', array(
            'resultado'=>$resultado,
            'rta'=>$consulta,
            'dat'=>$dato->num_cto,
            'val'=>$dato->valor_total,
            'search'=>$search
        ));

    }

    public function gestionarPago(){

        //$rtas = persona::where('estado','LIKE','100')->paginate(5);
        
        $rtas = DB::table('pagos')->paginate(10);
        
        return view('gco.Gpago.gestionPago', array(
            'rtas'=>$rtas
        ));
    } 

    public function detallePago($id){
        $pro = pago::where('id_pago','LIKE',$id)->first();

        return view('gco.Gpago.detalle_pago',array(
            'solicitud'=> $pro
        ));
    }

    public function editPago($id){
        $solicitud = pago::where('id_pago','LIKE',$id)->first();

        return view('gco.Gpago.edit_pago',array(
            'rta'=> $solicitud
        ));
    }

    public function actualizaPago($id, Request $request){
        
        $validaInfo = $this->validate($request, [
        'nanexo' => 'required',
        'obs' => 'required',
        ]);

        $sol = garantia::findOrFail($id);
        $user = \Auth::user();

        $sol->Num_anexo=  $request->input('nanexo');
        $sol->observaciones=  $request->input('obs');

        $sol->update();

        return redirect()->route('gestionarPago')->with(array('message'=>'La garantia se actualizó correctamente!!!'));

    }

        public function borraPago($id){
        

        $sol = pago::find($id);
        $user = \Auth::user();

        $sol->delete();

        return redirect()->route('gestionarPago')->with(array('message'=>'El pago fue borrado correctamente!!!'));

    }
}
