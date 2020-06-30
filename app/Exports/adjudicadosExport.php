<?php

namespace App\Exports;

use App\Contrato;
use App\proceso;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;



class adjudicadosExport implements FromCollection, WithHeadings
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	//$solicitudes = proceso::where('estado','LIKE','200')->paginate(5);
		
		$solicitudes = DB::table('procesos')
            ->join('contratos', 'procesos.id_proceso', '=', 'contratos.cod_proceso')
            ->select('procesos.cod_cdp','procesos.abogado','procesos.num_proceso','contratos.*')
            ->get();

            return $solicitudes;
}

 
    public function headings(): array
    {
        return [
            'Codigo CDP',
            'Abogado designado',
            'Numero de proceso',
            'auto',
            'num_cto',
			'contratista',
			'f_susc',
			'clase',
			'valor_mes',
			'valor_total',
			'obs_pago',
			'cod_dep',
			'plazo',
			'f_ini',
			'f_fin',
			'link',
			'expediente',
			'supervisor',
			'estado',
			'observaciones',
			'cod_proceso',
			'cod_maa',
			'cod_nivel',
			'updated_at',
			'created_at'
        ];
    }

}
