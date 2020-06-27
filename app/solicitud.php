<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
	protected $table = 'solicitudes';

	protected $primaryKey = 'N_solCDP';
	//Relacion uno a uno
    public function cdp(){
  	return $this->hasOne('App/cdp','id_cdp');
   	}

   	public function depen(){
  	return $this->hasOne('App/dependencia','id_dep');
   	}
}
