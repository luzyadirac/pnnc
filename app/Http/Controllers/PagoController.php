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
    	return view('gco.Gpago.crearPago');
    }

    public function guardarPago(Request $request){
    	//validar formulario
    	$validaInfo = $this->validate($request, [
    	'fpago' => 'required|unique:garantias,id_garantia',
    	'vpago' => 'required',
    	'spago' => 'required',
    	'cpago' => 'required|exists:contratos,id',
      	]);

    	$per = new pago();
    	$user = \Auth::user();

    	$per->f_pago=  $request->input('fpago');
    	$per->valor_pago=  $request->input('vpago');
    	$per->valor_saldo=  $request->input('spago');
    	$per->cod_contrato=  $request->input('cpago');
    	$per->observaciones=  $request->input('obs');
    	    	
    	$per->save();

    	return redirect()->route('home')->with(array(
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

        return redirect()->route('home')->with(array('message'=>'La garantia se actualizó correctamente!!!'));

    }
}
