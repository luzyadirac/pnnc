<?php

namespace App\Exports;

use App\Contrato;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;


class maaExport implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection()
    {

        $solicitudes = DB::table('contratos')
            ->join('personas', 'contratos.contratista', '=', 'personas.documento')
            ->orderBy('cod_maa')
            ->select('personas.Nombres','personas.Apellidos','contratos.num_cto','contratos.valor_mes','contratos.cod_dep','contratos.cod_maa')
            ->get();


        return $solicitudes;
    }

    public function headings(): array
    {
        return [
            'Nombres',
            'Apellidos',
            'Numero de contrato',
            'valor mensual',
            'Dependencia',
            'maa'
        ];
    }
}