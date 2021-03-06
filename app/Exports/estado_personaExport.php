<?php

namespace App\Exports;

use App\Contrato;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class estado_personaExport implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection()
    {

        $solicitudes = DB::table('contratos')
            ->orderBy('cod_maa')
            ->select('num_cto','valor_mes','cod_dep','observaciones','link')
            ->get();

        return $solicitudes;
    }

    public function headings(): array
    {
        return [
            'Numero de contrato',
            'valor mensual',
            'Dependencia',
            'Correo personal',
            'Observaciones',
            'Link'
        ];
    }

    public function sheets(): array
    {
        $sheets = [];

        for ($i = 1; $i <= 3; $i++) {
            $sheets[] = new InvoicesPerMonthSheet('categoria', $i);
        }

        return $sheets;
    }
}


