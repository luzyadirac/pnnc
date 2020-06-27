<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\contrato;
use App\proceso;
use App\persona;
use App\garantia;


use Illuminate\Http\Request;

class GarantiaController extends Controller
{
    public function crearGarantia(){
    	return view('gco.Ggarantia.crearGar');
    }

    public function guardarGarantia(Request $request){
    	//validar formulario
    	$validaInfo = $this->validate($request, [
    	'ngar' => 'required|unique:garantias,id_garantia',
    	'f_exp' => 'required',
    	'aseguradora' => 'required',
    	'anexo' => 'required',
    	'f_apro' => 'required',
    	'obs' => 'required',
    	'cto' => 'required|exists:contratos,num_cto',
      	]);

    	$per = new garantia();
    	$user = \Auth::user();

    	$per->id_garantia=  $request->input('ngar');
    	$per->fecha_exp=  $request->input('f_exp');
    	$per->aseguradora=  $request->input('aseguradora');
    	$per->Num_anexo=  $request->input('anexo');
    	$per->f_aprobacion=  $request->input('f_apro');
    	$per->id_contrato=  $request->input('cto');
    	$per->observaciones=  $request->input('obs');
    	    	
    	$per->save();

    	return redirect()->route('home')->with(array(
    		'message' => 'La garantia se creó correctamente!!'
    	)); 

    }
    public function buscarGarantia(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = garantia::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
        return view('gco.Ggarantia.buscarGar', array(
            'resultado'=>$resultado
        ));
    }

    public function gestionarGar(){

        //$rtas = persona::where('estado','LIKE','100')->paginate(5);
        
        $rtas = DB::table('garantias')->paginate(10);
        
        return view('gco.Ggarantia.gestionGar', array(
            'rtas'=>$rtas
        ));
    } 

    public function detalleGar($id){
        $pro = garantia::where('id_garantia','LIKE',$id)->first();

        return view('gco.Ggarantia.detalle_gar',array(
            'solicitud'=> $pro
        ));
    }

    public function editGarantia($id){
        $solicitud = garantia::where('id_garantia','LIKE',$id)->first();

        return view('gco.Ggarantia.edit_gar',array(
            'rta'=> $solicitud
        ));
    }

    public function actualizaGarantia($id, Request $request){
        
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
