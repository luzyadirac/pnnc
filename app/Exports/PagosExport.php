<?php

namespace App\Exports;

use App\Contrato;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class PagosExport implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection()
    {

        $solicitudes = DB::table('pagos')
            ->join('contratos', 'pagos.cod_contrato', '=', 'contratos.id')
            ->select('pagos.*','contratos.cod_dep','contratos.link')
            ->get();


        return $solicitudes;
    }

    public function headings(): array
    {
        return [
            'Id del pago',
            'Fecha del pago',
            'Valor pagado',
            'Saldo',
            'Observaciones',
            'Numero de contrato',
            'fecha de creacion',
            'última actualización',        
            'Dependencia',
            'Link'
        ];
    }

}


