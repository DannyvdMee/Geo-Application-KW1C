<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where('active', '=', 1)->get();

		return view('teacher/student/index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/student/create');
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
        $student = new Student;
        $student->number = $request->number;
        $student->name = $request->name;
        $student->active = $request->active;

        if (!empty($request->information)) {
        	$student->information = $request->information;
		}

        $student->save();

        return redirect('teacher/student');
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
		$student = Student::find($id);

		if ($student->visibility == 1) {
			$visibility = 0;
		} else if ($student->visibility == 0) {
			$visibility = 1;
		}

		$student->visibility = $visibility;

		$student->save();

		return redirect('teacher/student');
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
        $student = Student::find($id);

        return view('teacher/student/edit', ['student' => $student]);
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
        $student = Student::find($id);

		$student->number = $request->number;
		$student->name = $request->name;
		$student->active = $request->active;

		$student->save();

		return redirect('teacher/student');
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
        $student = Student::find($id);

        $student->active = 0;

        $student->save();

		return redirect('teacher/student');
    }
}
