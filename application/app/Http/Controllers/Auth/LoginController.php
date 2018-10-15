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

//	TODO the below 2 functions are redundant-ish. Go fix!

	public function loginRequest(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

		if (Auth::attempt(['email' => $email, 'password' => $password])) {

			$id = Auth::user()->getAuthIdentifier();

			$user = User::findOrFail($id);

			if ($user->active == 0) {
				$message = 'This account is not active or does not exist';

				// Log the user out.
				Auth::logout($request);
				Session::flash('error', $message);

				return view('auth/login');
			}

			if ($user->isAdmin) {
				return redirect('admin/dashboard');
			} else if ($user->isTeacher) {
				return redirect('teacher/dashboard');
			}

			$message = 'This account does not have a valid role. Please contact your system administrator';

			Auth::logout($request);
			Session::flash('error', $message);

			return view('auth/login', ['error' => $message]);
		}

		$message = 'Account could not be validated; try again';
		Session::flash('error', $message);

		return view('auth/login');
	}

//
//	Function which does stuff to make sure they're authenticated properly
//

	protected function authenticated(Request $request, $user)
	{
		if ($user->active == 0) {
			$message = 'This account is not active or does not exist';

			// Log the user out.
			Auth::logout($request);
			Session::flash('error', $message);

			return view('auth/login');
		}

		if ($user->isTeacher) {
			return redirect('teacher/dashboard');
		}

		if ($user->isAdmin) {
			return redirect('admin/dashboard');
		}

		return redirect('user/dashboard');
	}

	public function logout()
	{
		Auth::logout();

		Session::flush();

		return redirect('/login');
	}
}
