<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cdp extends Model
{
    protected $table = 'cdps';

    protected $primaryKey = 'id_cdp';
    //Relacion uno a uno
    public function solicitud(){
    	return $this->hasOne('App/solicitud','N_solCDP');
    }
    //Relacion uno a muchos
    public function rp(){
    	return $this->hasMany('App/rp');
    }
//muchos a uno
    public function proceso(){
  	return $this->belongsTo('App/proceso','id_proceso');
   }
}
