<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
	protected $table = 'pagos';
    
     protected $primaryKey = 'id_pago';   
    //muchos a uno
    public function contrato(){
  	return $this->belongsTo('App/contrato','id');
    }
}
