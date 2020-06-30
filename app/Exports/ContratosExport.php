<?php

namespace App\Exports;

use App\Contrato;

use Maatwebsite\Excel\Concerns\FromCollection;

class ContratosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	
        return Contrato::all();
    }
}
