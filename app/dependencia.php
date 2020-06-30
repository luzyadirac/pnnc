<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dependencia extends Model
{
    
	protected $table = 'dependencias';

    public function dependencias(){
    	return $this->hasMany('App\solicitud')
    }

    public function dependencias(){
    	return $this->hasMany('App\contrato')
    }
}
