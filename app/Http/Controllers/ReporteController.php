<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ContratosExport;
use App\Exports\ContratistasExport;
use App\Exports\maaExport;
use App\Exports\PagosExport;
use App\Exports\GarExport;
use App\Exports\estado_personaExport;
use App\Exports\inf_gestionExport;
use App\Exports\adjudicadosExport;
use Maatwebsite\Excel\Facades\Excel;


class ReporteController extends Controller
{

    public function gestionarReporte($opc){
       
        return view('gco.Greportes.gestionReport', array(
            'dato'=>$opc
        ));
    } 

    public function export() 
    {
        return Excel::download(new ContratosExport, 'contratos.xlsx');
    }

     public function adjudicados() 
    {
        return Excel::download(new adjudicadosExport, 'adjudicados.xlsx');
    }

    public function personas() 
    {
        return Excel::download(new ContratistasExport, 'personas.xlsx');
    }

    public function export_ig() 
    {
        return Excel::download(new inf_gestionExport, 'inf_gestion.xlsx');
    }

    public function export_maa() 
    {
        return Excel::download(new maaExport, 'contratos_maa.xlsx');
    }

    public function export_ep() 
    {
        return Excel::download(new estado_personaExport, 'estado_persona.xlsx');
    }

    public function export_gar() 
    {
        return Excel::download(new GarExport, 'garantias.xlsx');
    }

    public function export_pagos() 
    {
        return Excel::download(new PagosExport, 'pagos.xlsx');
    }
}
