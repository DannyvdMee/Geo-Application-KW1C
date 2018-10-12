<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Department\DepartmentRepository;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
	private $department;

	public function __construct(DepartmentRepository $department)
	{
		$this->department = $department;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('admin/department/index', ['departments' => $this->department->getAllActive()]);
	}

	public function create()
	{
		return view('admin/department/create');
	}

	/**
	 * @param DepartmentRequest $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(DepartmentRequest $request)
	{
		// TODO create DepartmentRequest

		$this->department->store($request->all());

		return redirect('admin/department');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$this->department->updateVisibility($id);

		return redirect('admin/department');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return view('admin/department/edit', ['department' => $this->department->getOne($id)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(DepartmentRequest $request, $id)
	{
		$this->department->update($request->all(), $id);

		return redirect('admin/department');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->department->softDelete($id);

		return redirect('admin/department');
	}
}
