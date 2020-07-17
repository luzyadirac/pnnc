<?php

namespace App\Exports;

use App\contrato;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ContratosExport implements FromCollection, WithHeadings
{
	use Exportable;

    public function collection()
    {    	
        return contrato::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Numero de contrato',
            'Constratista',
            'Fecha de suscripcion',
            'Clase',
            'Valor mensual',
            'Valor total',
            'Observaciones de pago',
            'dependencia',
            'plazo',
            'fecha de inicio',
            'fecha de terminacion',
            'Link',
            'Expediente',
            'supervisor',
            'estado',
            'observaciones',
            'proceso',
            'maa',
            'nivel',
            'ultima actualizacion',
            'creacion'
        ];
    }
}
