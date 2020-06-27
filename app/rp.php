<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rp extends Model
{
   //muchos a uno
   public function cdp(){
  	return $this->belongsTo('App/cdp','id_cdp');
   }

    public function contrato(){
  	return $this->belongsTo('App/contrato','id');//revisar que no sea num_cto
   }
}
