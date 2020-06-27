<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $table = 'personas';

 		protected $primaryKey = 'id_persona';
    //Relacion uno a uno 
    public function arl(){
    	return $this->hasOne('App/arl','id_arl');
 	}
    //Relacion uno a muchos
    public function contrato(){
    	return $this->hasMany('App/contrato');
   
    }
}
