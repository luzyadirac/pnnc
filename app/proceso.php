<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proceso extends Model
{
    //
    protected $table = 'procesos';

    protected $primaryKey = 'id_proceso';

    //Relacion uno a muchos
    public function contrato(){
    	return $this->hasMany('App/contrato');
    }
	
    public function cdp(){
  	return $this->hasMany('App/cdp');
   	}
}
