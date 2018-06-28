<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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

			$id = Auth::user()->getAuthIdentifier();

			$user = User::find($id);

			if ($user->active == 0) {
				$message = 'This account is not active or does not exist';

				// Log the user out.
				Auth::logout($request);
				Session::flash('error', $message);

				return view('auth/login');
			}

			if ($user->isAdmin) {
				return redirect('admin/projects');
			}

			return redirect('teacher/dashboard');

			//return response()->json(['message' => $user]);

		}

		return view('login', ['error' => $errorMessage]);
	}

	public function logout()
	{
		Auth::logout();

		Session::flush();

		return redirect('/login');
	}
}
