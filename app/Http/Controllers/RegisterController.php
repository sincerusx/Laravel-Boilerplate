<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidation;
use App\Models\User;
use Auth;

class RegisterController extends Controller {

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showRegistrationForm(){
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param \App\Http\Requests\RegisterValidation|\Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(RegisterValidation $request){

		/** @var User $user */
		$user = User::create([
			'username' => $request->input('username'),
			'password' => $request->input('password'),
			'email'    => $request->input('email'),
		]);

		// log user in
		Auth::guard()->login($user);

		return redirect('/');
	}
}
