<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\persona;


class PersonaController extends Controller
{
    public function crearPersona(){
    	return view('gco.Gpersona.crearPersona');
    }

    public function guardarPersona(Request $request){
    	//validar formulario
    	$validaInfo = $this->validate($request, [
    	'tdoc' => 'required',
    	'nombre' => 'required',
    	'apellido' => 'required',
    	'tel' => 'required|min:10',
    	'documento' => 'required|unique:personas,documento',
    	'f_nac' => 'required|date',
    	'clase' => 'required',
    	'mail_p' => 'required|unique:personas,correo_p|email',
    	'profesion' => 'required',
    	'formacion' => 'required',
    	'experiencia' => 'required',
    	'clase' => 'required',
    	'estado' => 'required',
    //  	'ccto' => 'required|exists:contratos,id',
      	]);

    	$per = new persona();
    	$user = \Auth::user();

    	$per->id_persona=  $request->input('documento');
    	$per->documento=  $request->input('documento');
    	$per->tipo_documento=  $request->input('tdoc');
    	$per->Nombres=  $request->input('nombre');
    	$per->Apellidos=  $request->input('apellido');
    	$per->Telefono=  $request->input('tel');
    	$per->genero=  $request->input('genero');
    	$per->fecha_nac=  $request->input('f_nac');
    	$per->correo_p=  $request->input('mail_p');
    	$per->correo_i=  $request->input('mail_i');
    	$per->profesion=  $request->input('profesion');
    	$per->formacion=  $request->input('formacion');
    	$per->experiencia=  $request->input('experiencia');
    	$per->estado=  $request->input('estado');
    	$per->clase=  $request->input('clase');
    	$per->observaciones=  $request->input('obs');
    	$per->hv_sigep=  $request->input('hv');
    	$per->cod_contrato=  $request->input('ccto');
    	
    	$per->save();

    	return redirect()->route('gestionarPer')->with(array(
    		'message' => 'El contratista se creó correctamente!!'
    	)); 

    }
    public function buscarPersona(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = persona::where($criterio,'LIKE','%'.$search.'%')->paginate(5);
        return view('gco.Gpersona.buscarPer', array(
            'resultado'=>$resultado
        ));
    }

        public function buscarPersona2(Request $request){

        $validaInfo = $this->validate($request, [
        'criterio' => 'required',
        'search' => 'required'
        ]);

        $search=  $request->input('search');
        $criterio =  $request->input('criterio');

        $resultado = persona::where( [[$criterio,'LIKE','%'.$search.'%'],['estado','LIKE',10]])->paginate(5);
        return view('gco.Gcontrato.miniB', array(
            'resultado'=>$resultado
        ));
    }

    public function gestionarPer(){
        //$rtas = persona::where('estado','LIKE','100')->paginate(5);
        
        $rtas = DB::table('personas')->paginate(10);
        
        return view('gco.Gpersona.gestionPer', array(
            'rtas'=>$rtas
        ));
    } 

        public function gestionarPer2(){
        //$rtas = persona::where('estado','LIKE','100')->paginate(5);
        
        $rtas = DB::table('personas')->paginate(10);
        
        return view('gco.Gcontrato.miniB', array(
            'rtas'=>$rtas
        ));
    } 

    public function detallePer($id){
        $pro = persona::where('id_persona','LIKE',$id)->first();

        return view('gco.Gpersona.detalle_per',array(
            'solicitud'=> $pro
        ));
    }

    public function editPersona($id){
        $solicitud = persona::where('id_persona','LIKE',$id)->first();

        return view('gco.Gpersona.edit_per',array(
            'rta'=> $solicitud
        ));
    }

    public function actualizaPersona($id, Request $request){
        
        $validaInfo = $this->validate($request, [
        'telefono' => 'required',
        'correo' => 'required',
        'prof' => 'required',
        'expe' => 'required',
        'hv' => 'required|unique:personas,hv_sigep',
        ]);

        $sol = persona::findOrFail($id);
        $user = \Auth::user();

        $sol->Telefono=  $request->input('telefono');
        $sol->correo_p=  $request->input('correo');
        $sol->profesion=  $request->input('profesion');
        $sol->experiencia=  $request->input('expe');
        $sol->hv_sigep =  $request->input('hv');

        $sol->update();

        return redirect()->route('gestionarPer')->with(array('message'=>'El contratista  se actualizó correctamente!!!'));

    }
}
