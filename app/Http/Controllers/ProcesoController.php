<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\proceso;

class ProcesoController extends Controller
{
    //
    public function crearProceso(){
    	return view('gco.Gproceso.crearProceso');
    }

    public function guardarProceso(Request $request){
    	//validar formulario
    	$validaInfo = $this->validate($request, [
    	'Numero_proceso' => 'required',
    	'modalidad' => 'required|not_in:0',
    	'abogado' => 'required|not_in:0',
    	'Numero_cdp' => 'required|min:4'    	
    	]);

    	$proc = new proceso();
    	$user = \Auth::user();

    	$proc->num_proceso=  $request->input('Numero_proceso');
    	$proc->modalidad =  $request->input('modalidad');
    	$proc->abogado = $request->input('abogado');
     	$proc->f_reparto = $request->input('freparto');
    	$proc->link = $request->input('enlace');
    	$proc->cod_cdp = $request->input('Numero_cdp');
		$proc->estado = $request->input('estado');


    	$proc->save();

    	return redirect()->route('gestionarProc')->with(array(
    		'message' => 'El proceso se creó correctamente!!'
    	));
    }

    public function buscarP(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = proceso::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
        return view('gco.Gproceso.buscarP', array(
            'resultado'=>$resultado
        ));
    }

    public function gestionarProc(){
        $rtas = proceso::where('estado','LIKE','100')->paginate(5);
        
        return view('gco.Gproceso.gestionProc', array(
            'rtas'=>$rtas
        ));
    } 

    public function detalleProc($id){
        $pro = proceso::where('num_proceso','LIKE',$id)->first();

        return view('gco.Gproceso.detalle_proc',array(
            'solicitud'=> $pro
        ));
    }

    public function editProceso($id){
        $solicitud = proceso::where('num_proceso','LIKE',$id)->first();

        return view('gco.Gproceso.edit_proc',array(
            'rta'=> $solicitud
        ));
    }

    public function actualizaProceso($id, Request $request){
        
        $validaInfo = $this->validate($request, [
        'abogado' => 'required',
        'reparto' => 'required',
        'enlace' => 'required'
        ]);

        $sol = proceso::findOrFail($id);
        $user = \Auth::user();

        $sol->abogado=  $request->input('abogado');
        $sol->f_reparto=  $request->input('reparto');
        $sol->link=  $request->input('enlace');

        $sol->update();

        return redirect()->route('gestionarProc')->with(array('message'=>'El proceso se actualizó correctamente!!!'));

    }


}
