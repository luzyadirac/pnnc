<?php

namespace App\Exports;

use App\Contrato;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class GarExport implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection()
    {

        $solicitudes = DB::table('garantias')
            ->join('contratos', 'garantias.id_contrato', '=', 'contratos.num_cto')
            ->select('garantias.*','contratos.cod_dep','contratos.link')
            ->get();


        return $solicitudes;
    }

    public function headings(): array
    {
        return [
            'Numero de garantía',
            'Tipo',
            'Aseguradora',
            'Fecha de expedición',
            'Numero de anexo',
            'Numero de aprobación',
            'Numero de contrato',
            'Observaciones',
            'última actualización',
            'fecha de creacion',
            'Dependencia',
            'Link'
        ];
    }

}


