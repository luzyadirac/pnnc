<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class arl extends Model
{
    protected $table = 'arls';
     //muchos a uno
    public function persona(){
  	return $this->belongsTo('App/persona','documento');
    }
}
