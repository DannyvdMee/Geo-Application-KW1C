<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 20-Jun-18
 * Time: 12:16
 */

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$departments = Department::all();

		return view('admin/department/index', ['departments' => $departments]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function storeNewDepartment(Request $request)
	{
		$department = new Department;
		$department->departmenttitle = $request->departmenttitle;
		$department->departmentstate = $request->departmentstate;

		$department->save();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showDepartment($id)
	{
		$department = Department::find($id);

		if ($department->departmentstate == true) {
			$departmentstate = 0;
		} else if ($department->departmentstate == false) {
			$departmentstate = 1;
		}

		$department->departmentstate = $departmentstate;

		$department->save();

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$department = Department::find($id);

		return view('admin/department/edit', ['department' => $department]);

		// SQL Insert to DB for editing the department
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$department = Department::find($id);

		$department->departmentstate = FALSE;

		$department->save();

		return view('admin/department/index');
	}
}
