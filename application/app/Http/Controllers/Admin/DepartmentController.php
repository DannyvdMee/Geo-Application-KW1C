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
		//$departments = Department::all();
		$departments = Department::where('active', '=', 1)->get();

		return view('admin/department/index', ['departments' => $departments]);
	}

	public function create()
	{
		return view('admin/department/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$department = new Department;
		$department->name = $request->name;
		$department->active = $request->active;

		$department->save();

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
		$department = Department::find($id);

		if ($department->visibility == 1) {
			$visibility = 0;
		} else if ($department->visibility == 0) {
			$visibility = 1;
		}

		$department->visibility = $visibility;

		$department->save();

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
		$department = Department::find($id);

		return view('admin/department/edit', ['department' => $department]);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$department = Department::find($id);

		$department->name = $request->name;

        $department->save();
        
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
		$department = Department::find($id);

		$department->active = 0;

		$department->save();

		return redirect('admin/department');
	}
}
