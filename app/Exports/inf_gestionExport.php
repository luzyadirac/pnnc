<?php

namespace App\Exports;

use App\Contrato;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class inf_gestionExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	
        $solicitudes = DB::table('procesos')
            ->join('contratos', 'contratos.cod_proceso', '=', 'procesos.id_proceso')
            ->select('procesos.num_proceso','procesos.modalidad','contratos.clase','contratos.valor_total','contratos.cod_dep')
            ->orderBy('procesos.modalidad', 'desc')
            ->get();

            return $solicitudes;
    }

    public function headings(): array
    {
        return [
            'Numero de proceso',
            'Modalidad',
            'Clase',
            'Valor total',
            'Dependencia'
        ];
    }
}