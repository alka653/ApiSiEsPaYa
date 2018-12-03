<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		return [
			'email' => 'required|max:190',
			'password' => 'required'
		];
	}
	public function messages(){
		return [
			'password.required' => 'Debes ingresar tu contraseña',
			'email.required' => 'Debes ingresar tu correo electrónico',
			'email.max' => 'Tu correo electrónico no debe superar los 190 carácteres'
		];
	}
}