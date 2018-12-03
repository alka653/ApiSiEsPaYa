<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Personas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller{
	public function signup(UserRequest $request){
		$persona = Personas::saveData([
			'nombre' => $request->nombre,
			'apellido' => $request->apellido
		]);
		User::saveData([
			'email' => $request->email,
			'persona_id' => $persona->id,
			'estado' => 'A'
		]);
		return response()->json([
			'message' => 'Te has registrado satisfactoriamente',
			'statusCode' => 201
		]);
	}
	public function login(LoginRequest $request){
		$data = [];
		$message = '';
		$statusCode = '';
		if(Auth::attempt(request(['email', 'password']))){
			$user = $request->user();
			if($user['estado'] == 'A'){
				$token = $user->createToken('Acces Cliente to SiEsPaYa');
				$data = [
					'accessToken' => $token->accessToken,
					'tokenType' => 'Bearer'
				];
				$message = 'Ingreso exitoso';
				$statusCode = 201;
			}else{
				$message = 'Tu cuenta no se encuentra activa';
				$statusCode = 401;
			}
		}else{
			$message = 'El correo electrónico y/o contraseña son incorrectos';
			$statusCode = 401;
		}
		return response()->json([
			'data' => $data,
			'message' => $message,
			'statusCode' => $statusCode
		]);
	}
	public function logout(Request $request){
		$request->user()->token()->revoke();
		return response()->json([
			'message' => 'Se cerró sesión exitósamente',
			'statusCode' => 201
		]);
	}
	public function user(Request $request){
		return response()->json($request->user());
	}
}