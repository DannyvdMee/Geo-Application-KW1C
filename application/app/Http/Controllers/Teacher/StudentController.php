<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Controllers\Controller;
use App\Student;
use App\Repositories\Student\StudentRepository;

class StudentController extends Controller
{
	private $student;

	public function __construct(StudentRepository $student)
	{
		$this->student = $student;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('teacher/student/index', ['students' => $this->student->getAllActive()]);
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
	public function store(StudentRequest $request)
	{
//    	TODO create studentRequest
		$this->student->store($request->all());

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
		$student = $this->student->getOne($id);

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
		return view('teacher/student/edit', ['student' => $this->student->getOne($id)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(StudentRequest $request, $id)
	{
		$this->student->update($request->all(), $id);

		return redirect('teacher/student');
	}

	public function massImport(Request $request)
	{
		$csv = $request->file('csv');

//		$tmp_file = $csv->tmp_name;
		$file_array = array_map('str_getcsv', file($csv));

		// Grab the first row of the file, and make a new array out of it
		$headers_array = $file_array[0];

		// Strip the header row out of the array
		array_splice($file_array, 0, 1);

		// Remove all empty values from array and sort the array alphabetically
		$filtered_headers_array = $sorted_headers_array = array_filter($headers_array);
		sort($sorted_headers_array);

		$columns_array = [
			0 => 'number',
			1 => 'name',
			2 => 'information',
			4 => 'visibility',
			5 => 'active',
		];

		$request->session()->put('db_headers', $columns_array);
		$request->session()->put('file_headers', $filtered_headers_array);
		$request->session()->put('data_array', $file_array);

		return redirect('teacher/student/import/link');
	}

	public function link(Request $request)
	{
		$db_headers = $request->session()->get('db_headers');
		$sorted_file_headers = $file_headers = $request->session()->get('file_headers');
		$data = $request->session()->get('data_array');
		sort($sorted_file_headers);

		return view('teacher/student/link', ['db_headers' => $db_headers, 'file_headers' => $file_headers, 'sorted_file_headers' => $sorted_file_headers, 'file_data' => $data]);
	}

	public function processLink(Request $request)
	{
		$file_data_array = [];

		$file_data_array[] = $request->session()->pull('db_headers');
		$data_array = $request->session()->pull('data_array');

		$student_attributes = $request->students;

		foreach ($data_array as $data) {
			$student = new Student;

			foreach ($student_attributes as $attribute => $data_index) {
				if (!empty($data[$data_index])) {
					$student->$attribute = $data[$data_index];
				}
			}

			$student->save();
		}

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
		$student = $this->student->getOne($id);

		$student->active = 0;

		$student->save();

		return redirect('teacher/student');
	}
}
