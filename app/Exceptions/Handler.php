<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler{
    protected $dontReport = [];
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];
    public function report(Exception $exception){
        parent::report($exception);
    }
    public function render($request, Exception $exception){
        return parent::render($request, $exception);
    }
    protected function unauthenticated($request, AuthenticationException $exception){
        if($request->expectsJson()){
            return response()->json([
                'message' => 'Acceso no autorizado',
                'statusCode' => 403
            ]);
        }
        return redirect()->guest(route('login'));
    }
}