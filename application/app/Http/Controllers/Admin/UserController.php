<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\User\UserRepository;

class UserController extends Controller
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
		$users = $this->user->getAllActiveByLastnameAsc();
		$departments = $this->department->getAllActive();

		return view('admin/user/index', ['users' => $users, 'departments' => $departments]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin/user/create', ['departments' => $this->department->getAllActive()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(UserRequest $request)
	{
		$this->user->store($request->all());

		return redirect('admin/user');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$this->user->updateVisibility($id);

		return redirect('admin/user');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$user = $this->user->getOne($id);
		$departments = $this->department->getAllActive();

		return view('admin/user/edit', ['user' => $user, 'departments' => $departments]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(UserRequest $request, $id)
	{
		$this->user->update($request->all(), $id);

		return redirect('admin/user');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->user->softDelete($id);

		return redirect('admin/user');
	}

}
