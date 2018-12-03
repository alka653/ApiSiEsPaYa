<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

abstract class ApiRequest extends FormRequest{
	abstract public function rules();
	abstract public function authorize();
	public function failedValidation(Validator $errors){
		throw new HttpResponseException(response()->json([
			'errors' => $errors->errors(),
			'message' => 'Hay algunos campos con valores no válidos',
			'statusCode' => 401
		], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
	}
}