<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model{
	protected $guarded = [];
	public $timestamps = false;
	public function puesto(){
		return $this->belongsTo('App\Puestos', 'puesto_id');
	}
	public function categoria(){
		return $this->belongsTo('App\Categorias', 'categoria_id');
	}
	public function multimedia(){
		return $this->hasMany('App\ProductosMultimedias', 'producto_id');
	}
}