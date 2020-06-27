<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modificacion extends Model
{
    	protected $table = 'modificaciones';
       
    //muchos a uno
    public function contrato(){
  	return $this->belongsTo('App/contrato','id');
    }
}
