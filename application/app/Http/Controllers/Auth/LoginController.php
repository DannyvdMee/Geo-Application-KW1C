<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function username()
	{
		return 'username';
	}

	public function loginRequest(Request $request)
	{
		$email    = $request->email;
		$password = $request->password;

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			// TODO Build if statement to check if user is admin or teacher and redirect it to the current page.

			return view('home', ['loggedinUser' => $email]);
		}

		$errorMessage = TRUE;

		return view('login', ['error' => $errorMessage]);
	}

	public function logout()
	{
		Auth::logout();

		Session::flush();

		return response()
			->json(['message' => 'You have logged out'], 200);
	}
}
