<?php

namespace App\Http\Controllers\Api;

use App\Productos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller{
	public function list(Request $request){
		$productos = Productos::with('puesto', 'categoria')->paginate(10)->map(function($producto){
			unset($producto->puesto->propietario_id, $producto->puesto->estado, $producto->puesto_id, $producto->categoria_id);
			$producto->precio = '$ '.number_format($producto->precio);
			return $producto;
		});
		return response()->json([
			'data' => $productos,
			'statusCode' => 201
		]);
	}
	public function show(Productos $producto){
		$producto->puesto = $producto->puesto;
		$producto->categoria = $producto->categoria;
		$producto->precio = '$ '.number_format($producto->precio);
		unset($producto->puesto->propietario_id, $producto->puesto->estado, $producto->puesto_id, $producto->categoria_id);
		return response()->json([
			'data' => $producto,
			'statusCode' => 201
		]);
	}
}