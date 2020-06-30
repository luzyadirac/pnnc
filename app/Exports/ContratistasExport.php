<?php

namespace App\Exports;

use App\Contrato;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;


class ContratistasExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	//$solicitudes = proceso::where('estado','LIKE','200')->paginate(5);
		
		$solicitudes = DB::table('personas')
            ->join('contratos', 'personas.documento', '=', 'contratos.contratista')
            ->select('personas.Nombres', 'personas.Apellidos','personas.documento',
                'personas.correo_p','personas.profesion','contratos.num_cto','contratos.valor_mes','contratos.valor_total','contratos.plazo','contratos.f_fin')
            ->get();

        return $solicitudes;
    }

    public function headings(): array
    {
        return [
            'Nombres',
            'Apellidos',
            'Documento',
            'Correo personal',
            'Profesión',
            'Numero de contrato',
            'valor mensual',
            'valor total',
            'plazo',
            'fecha de terminación'
        ];
    }
}
