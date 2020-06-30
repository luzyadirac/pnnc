<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\contrato;
use App\proceso;
use App\persona;
use App\cdp;
use App\rp;

class ContratoController extends Controller
{
    public function crearContrato($id){


        $areasP = DB::table('dependencias')
                    ->orderBy('id_dep')                    
                    ->get();

        $procesos = DB::table('procesos')
                    ->where('estado', '100')
                    ->orderBy('num_proceso')                    
                    ->get();

        $per = DB::table('personas')
                    ->where('documento', $id)                   
                    ->get();

    	return view('gco.Gcontrato.crearContrato',array(
            'areasP'=>$areasP,
            'procesos'=>$procesos,
            'per'=>$per
        ));
    }

    public function guardarContrato(Request $request){
    	//validar formulario

    	$validaInfo = $this->validate($request, [
    	'Ncto' => 'required|min:12,unique:contratos,num_cto',
    	'f_susc' => 'required|date',
    	'clase' => 'required',
    	'v_mes' => 'required|min:0',
    	'v_total' => 'required',
    	'depe' => 'required',
    	'f_ini' => 'required|date',
    	'f_ter' => 'required|date|after:f_susc',
    	'plazo' => 'required|integer',
    	'super' => 'required',
    	'cproceso' => 'required',
    	'cmaa' => 'required',
    	'link' => 'active_url',
    	'cnivel' => 'required',
        'o_pago' => 'required',
        'contra' => 'required'
    	]);

    	$cont = new contrato();
    	$user = \Auth::user();

    	$cont->num_cto=  $request->input('Ncto');
        $cont->contratista=  $request->input('contra');
    	$cont->f_susc=  $request->input('f_susc');
    	$cont->clase=  $request->input('clase');
    	$cont->valor_mes=  $request->input('v_mes');
    	$cont->valor_total=  $request->input('v_total');
    	$cont->obs_pago=  $request->input('o_pago');
    	$cont->cod_dep=  $request->input('depe');
    	$cont->plazo=  $request->input('plazo');
    	$cont->f_ini=  $request->input('f_ini');
    	$cont->f_fin=  $request->input('f_ter');
    	$cont->link=  $request->input('link');
    	$cont->expediente=  $request->input('exp');
    	$cont->supervisor=  $request->input('super');
    	$cont->estado=  $request->input('estado');
    	$cont->observaciones=  $request->input('obs');
    	$cont->cod_proceso=  $request->input('cproceso');
    	$cont->cod_maa=  $request->input('cmaa');
    	$cont->cod_nivel=  $request->input('cnivel');
  
        DB::table('procesos')
            ->where('id_proceso', $request->input('cproceso'))
            ->update(['estado' => 200]);

        DB::table('personas')
            ->where('documento', $request->input('contra'))
            ->update(['estado' => 20]);

    	$cont->save();

    	return redirect()->route('home')->with(array(
    		'message' => 'El contrato se creó correctamente!!'
    	)); 
    }

        public function gestionarCon(){
        $solicitudes = contrato::where('estado','LIKE','100')->paginate(5);
        
        $certificados = DB::table('contratos')
                            ->orderBy('id')
                            ->get();

        return view('gco.Gcontrato.gestionCon', array(
            'rtas'=>$solicitudes,
            'certificados'=>$certificados
        ));
    }

        public function buscarContrato(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = contrato::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
        return view('gco.Gcontrato.buscarCon', array(
            'resultado'=>$resultado
        ));
    }

        public function detalleCon($id){
            
        $Solicitud = contrato::where('id','LIKE',$id)->first();

        $registros = rp::where('id_contrato','LIKE',$Solicitud->id)->paginate(5);

        return view('gco.Gcontrato.detalle_con',array(
            'solicitud'=> $Solicitud,
            'registros'=> $registros
        ));
    }

    public function detalleConP($id_per){
            
        $Solicitud = contrato::where('contratista','LIKE',$id_per)->first();

        $registros = rp::where('id_contrato','LIKE',$Solicitud->id)->paginate(5);

        return view('gco.Gcontrato.detalle_con',array(
            'solicitud'=> $Solicitud,
            'registros'=> $registros 
        ));
    }

      public function editContrato($id_sol){
        $solicitud = contrato::where('num_cto','LIKE',$id_sol)->first();

        return view('gco.Gcontrato.edit_con',array(
            'rta'=> $solicitud
        ));
    }

    public function actualizaContrato($id_sol, Request $request){
        
        $validaInfo = $this->validate($request, [
        'o_pago' => 'required',
        'super' => 'required',
        'obs' => 'required',
        'plazo' => 'required'
        ]);

        $sol = contrato::findOrFail($id_sol);
        $user = \Auth::user();

        $sol->obs_pago=  $request->input('o_pago');
        $sol->plazo=  $request->input('plazo');
        $sol->supervisor=  $request->input('super');
        $sol->observaciones=  $request->input('obs');

        $sol->update();

        return redirect()->route('home')->with(array('message'=>'El contrato se actualizó correctamente!!!'));

    }

    public function crearRp($id){
        $res = DB::table('cdps')                  
                    ->get();

        return view('gco.Gcontrato.crearRp',array(
            'res'=>$res,
            'id'=>$id
        ));
    }

    public function guardarRp(Request $request){
        //validar formulario

        $validaInfo = $this->validate($request, [
        'nreg' => 'required|unique:rps,id_rp',
        'freg' => 'required|date',
        'ncdp' => 'required',
        'cto' => 'required|exists:contratos,num_cto',
        ]);

        $cont = new rp();
        $user = \Auth::user();

        $dato = contrato::where('num_cto','LIKE',$request->input('cto'))->first();

        $cont->id_rp=  $request->input('nreg');
        $cont->fecha_sol=  $request->input('freg');
        $cont->fecha_reg=  $request->input('freg');
        $cont->subprograma=  $request->input('sub');
        $cont->cod_cdp=  $request->input('ncdp');
        $cont->id_contrato=  $request->input('cto');
        
        $cont->save();

        return redirect()->route('mostrarCo',$dato->id)->with(array(
            'message' => 'El regitro se creó correctamente!!'
        )); 
    }


}
