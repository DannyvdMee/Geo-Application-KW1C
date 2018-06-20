<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 20-Jun-18
 * Time: 12:16
 */

namespace App\Http\Controllers\Admin;

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
		return view('admin/department', ['departments' => $this->showAllDepartments()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function storeNewDepartment($departmentTitle)
	{
		// Insert SQL statement for new Department
	}


	public function showAllDepartments(){
		$allDepartments = [
			'ICT-Academie' => true,
			'TheaterOpleiding' => true,
			'KappersOpleiding' => false
		];

		return $allDepartments;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showDepartment($id)
	{
		// Insert SQL statement on recieving the Department by it's ID

		return view('deparment/edit', [$departmentTitle, $departmentActiveValue]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id, $departmentTitle)
	{
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
		// Insert SQL statement for deleting the Department by it's UUID
		// Also first search of title is the same in SQL
	}
}
