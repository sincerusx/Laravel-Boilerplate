<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterValidation extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 * If the user is already logged in they will not be authorised.
	 *
	 * @return bool
	 */
	public function authorize(){
		// @todo use middleware here?
		if(false === Auth::check()){
			return true;
		}

		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(){
		return [
			'username'              => 'required|string|min:5|max:50|unique:users',
			'email'                 => 'required|string|email|min:5|max:100|unique:users',
			'password'              => 'required|string|min:6',
			'password_confirmation' => 'same:password',
		];
	}

	/**
	 * Get custom messages for validator errors.
	 *
	 * @return array
	 */
	public function messages(){
		return [
			'username.required'               => 'Please enter a username',
			'username.string'                 => 'Please enter a valid username',
			'username.min'                    => 'Please enter a valid username',
			'username.max'                    => 'Please enter a valid username',
			'username.unique'                 => 'Sorry this username is already in use',
			'email.required'                  => 'Please enter your e-mail address',
			'email.string'                    => 'Please enter a valid e-mail address',
			'email.email'                     => 'Please enter a valid e-mail address',
			'email.min'                       => 'Please enter a valid e-mail address',
			'email.max'                       => 'Please enter a valid e-mail address',
			'email.unique'                    => 'Sorry this e-mail address is already in use',
			'password.required'               => 'Please enter your password',
			'password.string'                 => 'Please enter a valid password',
			'password.min'                    => 'Please enter a valid password',
			'password_confirmation.same'      => 'Please make sure your passwords match same',

		];
	}

	/**
	 * Handle a failed validation attempt.
	 *
	 * @param  \Illuminate\Contracts\Validation\Validator $validator
	 *
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function failedValidation(Validator $validator){

		throw new ValidationException($validator, $this->response(
			$this->formatErrors($validator)
		));
	}

	/**
	 * Get the failed validation response for the request.
	 *
	 * @param array $errors
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function response(array $errors){

		if($this->expectsJson()){
			$transformed = [];

			foreach($errors as $field => $message){
				$transformed[] = [
					//	'field'   => $field,
					$field => $message[ 0 ],
				];
			}

			return response()->json(['errors' => $transformed,], JsonResponse::HTTP_OK);
		}

		return $this->redirector->to($this->getRedirectUrl())
								->withInput($this->except($this->dontFlash))
								->withErrors($errors, $this->errorBag);

	}
}
