<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Student\StudentRepository;
use App\Repositories\StudentGroup\StudentGroupRepository;

class GroupController extends Controller
{
	private $student;
	private $studentgroup;

	public function __construct(StudentRepository $student, StudentGroupRepository $studentgroup)
	{
		$this->student = $student;
		$this->studentgroup = $studentgroup;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher/group/index', ['groups' => $this->studentgroup->getAllActive()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/group/create', ['students' => $this->student->getAllActive()]);
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
//    	TODO create studentGroupRequest

		$request_collection = collect($request->all());

		$request_collection->put('url_id', bin2hex(random_bytes(40)));
		$request_collection->put('active', 1);

        $group = $this->studentgroup->store($request_collection->toArray());

		$student_id_array = [];

		foreach ($request->students as $user) {
			$student_id_array[] = $user;
		}

		$students = $this->student->getOne($student_id_array);

		$group->students()->attach($students);

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
		$group = $this->studentgroup->getOne($id);

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
		return view('teacher/group/edit', ['group' => $this->studentgroup->getOne($id)]);
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
		$this->studentgroup->update($request->all(), $id);
        
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
		$group = $this->studentgroup->getOne($id);

		$group->active = 0;

		$group->save();

		return redirect('teacher/group');
    }
}
