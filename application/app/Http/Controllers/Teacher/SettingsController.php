<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
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
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserRequest $request)
	{
		$user = $this->user->getCurrentAuthenticated();

		$this->user->update($request->all(), $user);

		return redirect('teacher/settings');
	}

	public function changePassword(UserRequest $request)
	{
		$this->user->changePassword($request->all());

		return redirect('teacher/settings');
	}

}
