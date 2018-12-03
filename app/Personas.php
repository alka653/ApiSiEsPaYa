<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model{
	protected $guarded = [];
	public $timestamps = false;
	protected $fillable = ['nombre', 'apellido', 'coordenadas_residencia', 'municipio_id'];
	public static function saveData($data){
		return Personas::create($data);
	}
}