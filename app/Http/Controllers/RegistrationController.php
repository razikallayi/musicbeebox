<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Registration;
use Validator;

class RegistrationController extends Controller
{
	public function sign_up(Request $request)
	{

		// $this->validate($request, [
		// 	'username' => 'required',
		// 	'email' => 'required',
		// 	'password' => 'required',
		// 	'role' => 'required',
		// 	'is_checked' => 'required',

		// 	]);
		
		$registration = new Registration;
		$registration->registerData($request);
		return back();
	}
}
