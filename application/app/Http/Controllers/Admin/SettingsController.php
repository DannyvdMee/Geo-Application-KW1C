<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

        return view('admin/settings/index', ['user' => $user, 'departments' => $departments]);
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
//    	TODO implement UserRequest

        $user = $this->user->getCurrentAuthenticated();

        $this->user->update($request->all(), $user);

        return redirect('admin/settings');
    }

    public function changePassword(Request $request) {
//    	TODO create changePassword method in repository

        $user = $this->user->getCurrentAuthenticated();

        if (Hash::check($request->oldpassword, $user->password)) {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);

                $user->save();

                return redirect('admin/settings');
            }
        }
    }
}
