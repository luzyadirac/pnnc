<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;
use App\dependencia;
use App\solicitud;
use App\cdp;

class GestioncdpController extends Controller
{

//Gestion de solicitudes y CDPs
    public function gestionarCdp(){
        $solicitudes = solicitud::where('estado','LIKE','1')->paginate(5);
        
        
        $certificados = DB::table('cdps')
                            ->orderBy('updated_at')
                            ->get();

        return view('gco.Gcdp.gestionCdp', array(
            'solicitudes'=>$solicitudes,
            'certificados'=>$certificados
        ));
    }
//gestion de las SOLICITUDES

    public function buscarSolicitud(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = solicitud::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
        return view('gco.Gcdp.buscarS', array(
            'resultado'=>$resultado,
            'asunto'=>'SOLICITUD'
        ));
    }

    public function detalleSol($id_sol){
        $Solicitud = solicitud::where('N_solCDP','LIKE',$id_sol)->first();

        return view('gco.Gcdp.detalle_sol',array(
            'solicitud'=> $Solicitud
        ));
    }

    public function editSol($id_sol){
        $solicitud = solicitud::where('N_solCDP','LIKE',$id_sol)->first();

        return view('gco.Gcdp.edit_sol',array(
            'solicitud'=> $solicitud
        ));
    }

    public function actualizaSol($id_sol, Request $request){
        
        $validaInfo = $this->validate($request, [
        'objeto' => 'required',
        'fuente' => 'required'
        ]);

        $sol = solicitud::findOrFail($id_sol);
        $user = \Auth::user();

        $sol->Objeto=  $request->input('objeto');
        $sol->Fuente=  $request->input('fuente');
        $sol->Comentarios=  $request->input('comentarios');

        $sol->update();

        return redirect()->route('home')->with(array('message'=>'La solicitd se Actualizó correctamente!!!'));

    }
//gestion de los CDPs

    public function buscarCdp(Request $request){

		$validaInfo = $this->validate($request, [
    	'criterio' => 'required',
    	'search' => 'required'
    	]);

    	$search=  $request->input('search');
    	$criterio =  $request->input('criterio');

    	$resultado = cdp::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
    	return view('gco.Gcdp.buscarS', array(
			'resultado'=>$resultado,
			'asunto'=>'CDP'
    	));
    }

    public function buscarCdpAll(Request $request){
    
    	$resultado = cdp::all();
    	return view('gco.Gcdp.buscarS', array(
			'resultado'=>$resultado,
			'asunto'=>'CDP'
    	));
    }

    public function detalleCdp($id){
        $rta = cdp::where('id_cdp','LIKE',$id)->first();

        return view('gco.Gcdp.detalle_cdp',array(
            'rta'=> $rta
        ));
    }

    public function editCdp($id){
        $rta = cdp::where('id_cdp','LIKE',$id)->first();

        return view('gco.Gcdp.edit_cdp',array(
            'rta'=> $rta
        ));
    }

    public function actualizaCdp($id, Request $request){
        
        $validaInfo = $this->validate($request, [
        'codigoR' => 'required',
        'tipo' => 'required',
        'obs' => 'required'
        ]);

        $sol = cdp::findOrFail($id);
        $user = \Auth::user();

        $sol->codigo_rubro=  $request->input('codigoR');
        $sol->tipo=  $request->input('tipo');
        $sol->observaciones=  $request->input('obs');

        $sol->update();
        return redirect()->route('home')->with(array('message'=>'El CDP se Actualizó correctamente!!!'));

    }
}
