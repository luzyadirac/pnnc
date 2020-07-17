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
    public function crearCdp($ident=null){ 
   

        $solicitudes = solicitud::where('estado','LIKE','1')->paginate(5);
		return view('gco.Gcdp.crearCdp', array(
            'solicitudes'=>$solicitudes,
            'ident'=>$ident
        ));
    }

    public function guardarCdp(Request $request){
    	$validaInfo = $this->validate($request, [
    	'Numero_cdp' => 'required|min:4,required:cdps,id_cdp',
    	'fecha' => 'required',
    	'rubro' => 'required',
    	'Numero_solicitud' => 'required|not_in:0',
    	'tipo' => 'required'
    	]);

    	$certificado = new cdp();
    	$sol = new solicitud();
    	$user = \Auth::user();

    	$certificado->id_cdp=  $request->input('Numero_cdp');
    	$certificado->fecha=  $request->input('fecha');
    	$certificado->codigo_rubro=  $request->input('rubro');
    	$certificado->tipo=  $request->input('tipo');
    	$certificado->observaciones=  $request->input('obs');
    	$certificado->cod_solicitud=  $request->input('Numero_solicitud');
        
    	$certificado->save();

        DB::table('solicitudes')
            ->where('n_solCDP', $request->input('Numero_solicitud'))
            ->update(['estado' => 2]);

    	return redirect()->route('gestionarCdp')->with(array(
    		'message' => 'El CDP se creó correctamente!!'
    	)); 
    }
}
