<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    protected $table = 'contratos';
    // uno a muchos
    
        public function rp(){
    	return $this->hasMany('App/rp');
    }
        
        public function pago(){
    	return $this->hasMany('App/pago');
    }
       
        public function modificacion(){
    	return $this->hasMany('App/modificacion');
    }
       
        public function persona(){
    	return $this->hasMany('App/persona');
    }
    //muchos a uno
    public function proceso(){
  	return $this->belongsTo('App/proceso','id_proceso');
    }

    //Relacion uno a uno 
    public function garantia(){
    	return $this->hasOne('App/garantia','id_garantia');
    }

}
