<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Department\DepartmentRepository;
use App\Repositories\User\UserRepository;

class SettingsController extends Controller
{
	private $department;
	private $user;

	public function __construct(DepartmentRepository $department, UserRepository $user)
	{
		$this->department = $department;
		$this->user = $user;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->getCurrentAuthenticated();

        $departments = $this->department->getAllActive();

        return view('teacher/settings/index', ['user' => $user, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $this->user->getCurrentAuthenticated();

		$this->user->update($request->all(), $user);

        return redirect('teacher/settings');
    }

    public function changePassword(Request $request) {
        $user = $this->user->getCurrentAuthenticated();

        if (Hash::check($request->oldpassword, $user->password)) {
            echo 'Passwords are the same';
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                echo 'changed password';

                $user->save();

                return redirect('teacher/settings');
            }
        }
    }

}
