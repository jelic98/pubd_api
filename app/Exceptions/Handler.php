<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {
   
    public function report(Exception $e) {
        parent::report($e);
    }

	public function render($request, Exception $e) {
		if(env('APP_DEBUG', false)) {
        	return parent::render($request, $e);
		}
		
		$response = [];	
	
		if(is_object($e)) {
			$e = substr(strrchr(get_class($e), "\\"), 1);
		}

		$response['code'] = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;
		$reponse['message'] = empty($e) ? 'Server error' : $e;

    	return response()->json($response);
	} 
}
