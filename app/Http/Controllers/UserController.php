<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHashet;

class UserController extends Controller {

	public function login(Request $request) {
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
			'token' => 'required'
		]);

		$user = User::where('email', $request['email'])->firstOrFail();

		if(!app('hash')->check($request['password'], $user->password)) {
			return response('Incorrect password', 400);
		}

		$token = $this->createToken();

		User::where('id', $user->id)
			->update([
				'accessToken' => $token
			]);

		return response('Success', 200);
	}

	public function logout() {
		UsersController::current()->update([
			'accessToken' => null
		]);
		
		return response('Success', 200);
	}

	public function contact(Request $request) {
	
	}

	public function createToken() {
		do {
			$token = str_random(64);
		}while(User::where("accessToken", $token)->first() instanceof User);
	}

	public function hash($password) {
		return app('hash')->make($password);
	}

	public static function current() {
		return User::findOrFailt(Auth::user()->id);
	}
}
?>
