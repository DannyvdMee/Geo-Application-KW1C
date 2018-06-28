<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\StudentGroup;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = StudentGroup::where('active', '=', 1)->get();

        return view('teacher/group/index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$students = Student::where('active', '=', 1)->get();

        return view('teacher/group/create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new StudentGroup();

        $group->url_id = bin2hex(random_bytes(40));
        $group->groupname = $request->groupname;
        $group->active = 1;

		$group->save();

		$student_id_array = [];

		foreach ($request->users as $user) {
			$id = Student::where('');
		}

        return redirect('teacher/group');

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
		$group = StudentGroup::find($id);

		if ($group->visibility == 1) {
			$visibility = 0;
		} else if ($group->visibility == 0) {
			$visibility = 1;
		}

		$group->visibility = $visibility;

		$group->save();
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
		$group = StudentGroup::find($id);

		return view('teacher/group/edit', ['group' => $group]);
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
		$group = StudentGroup::find($id);

		$group->groupname = $request->groupname;

        $group->save();
        
        return redirect('teacher/group');
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
		$group = StudentGroup::find($id);

		$group->active = 0;

		$group->save();

		return redirect('teacher/group');
    }
}
