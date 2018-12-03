<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
	use HasApiTokens, Notifiable;
	public $timestamps = false;
	protected $fillable = [
		'email', 'password', 'persona_id', 'estado', 'foto'
	];
	protected $hidden = [
		'password', 'remember_token',
	];
	public static function saveData($request){
		//$request['password'] = bcrypt(random_int(1000, 9999));
		$request['password'] = bcrypt(1234);
		return User::create($request);
	}
}