<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class UserRequest extends ApiRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		return [
			'nombre' => 'required|max:30',
			'apellido' => 'required|max:30',
			'email' => 'required|max:190|unique:users,email,'.$this->user
		];
	}
	public function messages(){
		return [
			'nombre.required' => 'Debes ingresar tu nombre',
			'nombre.max' => 'Tu nombre no debe superar los 30 carácteres',
			'apellido.required' => 'Debes ingregar tu apellido',
			'apellido.max' => 'Tu apellido no debe superar los 30 carácteres',
			'email.required' => 'Debes ingresar tu correo electrónico',
			'email.max' => 'Tu correo electrónico no debe superar los 190 carácteres',
			'email.unique' => 'El correo electrónico ya se enuentra registrado'
		];
	}
}