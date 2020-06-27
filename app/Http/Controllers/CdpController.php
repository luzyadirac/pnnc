<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\cdp;
use App\solicitud;

class CdpController extends Controller
{
    public function crearCdp(){
   

        $solicitudes = solicitud::where('estado','LIKE','1')->paginate(5);
		return view('gco.Gcdp.crearCdp', array(
            'solicitudes'=>$solicitudes
        ));
    }

    public function guardarCdp(Request $request){
    	$validaInfo = $this->validate($request, [
    	'Ncdp' => 'required|min:4,required:cdps,id_cdp',
    	'fecha' => 'required',
    	'rubro' => 'required',
    	'Nsol' => 'required',
    	'tipo' => 'required'
    	]);

    	$certificado = new cdp();
    	$sol = new solicitud();
    	$user = \Auth::user();

    	$certificado->id_cdp=  $request->input('Ncdp');
    	$certificado->fecha=  $request->input('fecha');
    	$certificado->codigo_rubro=  $request->input('rubro');
    	$certificado->tipo=  $request->input('tipo');
    	$certificado->observaciones=  $request->input('obs');
    	$certificado->cod_solicitud=  $request->input('Nsol');
        
    	$certificado->save();

        DB::table('solicitudes')
            ->where('n_solCDP', $request->input('Nsol'))
            ->update(['estado' => 2]);

    	return redirect()->route('home')->with(array(
    		'message' => 'El CDP se creó correctamente!!'
    	)); 
    }
}
