<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class garantia extends Model
{
    protected $table = 'garantias';

    protected $primaryKey = 'id_garantia';
       
    //Relacion uno a uno 
    public function contrato(){
    	return $this->hasOne('App/contrato','id_contrato');
    }
}
