<?php

namespace App\Http\Controllers\Teacher; //TODO: 'App\Http\Controllers\Teacher' After moving ExerciseController to Teacher

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exercise;

class ExerciseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$exercises = Exercise::where('active', '=', TRUE)->get();

		return view('teacher/exercise/index', ['exercises' => $exercises]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('teacher/exercise/create');
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
		$exercise = new Exercise;
		$exercise->title = $request->title;
		//$exercise->content = $request->content;
		$exercise->picture = $request->picture;
		$exercise->goodanswer = $request->goodanswer;

		$exercise->save();

		return redirect('teacher/exercise');
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
		$exercise = Exercise::find($id);

		if ($exercise->visibility == 1) {
			$visibility = 0;
		} else if ($exercise->visibility == 0) {
			$visibility = 1;
		}

		$exercise->visibility = $visibility;

		$exercise->save();

		return redirect('teacher/exercise/index');
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
		$exercise = Exercise::find($id);

		return view('teacher/exercise/edit', ['exercise' => $exercise]);
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
		$exercise = Exercise::find($id);

		$exercise->exercisenumber = $request->exercisenummber;
		$exercise->exercisename = $request->exercisename;
		$exercise->active = $request->active;

		$exercise->save();

		return redirect('teacher/exercise/index');
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
		$exercise = Exercise::find($id);

		$exercise->active = FALSE;

		$exercise->save();

		return view('teacher/exercise/index');
	}
}