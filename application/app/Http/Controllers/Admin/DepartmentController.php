<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 20-Jun-18
 * Time: 12:16
 */

namespace App\Http\Controllers\Admin;

use App\Repositories\Department\DepartmentRepository;
use Illuminate\Http\Request;
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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
//		TODO create DepartmentRequest

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
		$department = $this->department->getOne($id);

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
		return view('admin/department/edit', ['department' => $this->department->getOne($id)]);
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
		$department = $this->department->getOne($id);

		$department->active = 0;

		$department->save();

		return redirect('admin/department');
	}
}
