<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Exercise\ExerciseRepository;
use App\Repositories\Poi\PoiRepository;

class ExerciseController extends Controller
{
	private $exercise;
	private $poi;

	public function __construct(ExerciseRepository $exercise, PoiRepository $poi)
	{
		$this->exercise = $exercise;
		$this->poi = $poi;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('teacher/exercise/index', ['exercises' => $this->exercise->getAllActive()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('teacher/exercise/create', ['poi' => $this->poi->getLatestPoi()]);
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
//		TODO create ExerciseRequest
		$this->exercise->store($request->all());

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
		$exercise = $this->exercise->getOne($id);

		if ($exercise->visibility == 1) {
			$visibility = 0;
		} else if ($exercise->visibility == 0) {
			$visibility = 1;
		}

		$exercise->visibility = $visibility;

		$exercise->save();

		return redirect('teacher/exercise');
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
		return view('teacher/exercise/edit', ['exercise' => $this->exercise->getOne($id)]);
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
		$this->exercise->update($request->all(), $id);

		return redirect('teacher/exercise');
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
		$exercise = $this->exercise->getOne($id);

		$exercise->active = 0;

		$exercise->save();

		return view('teacher/exercise');
	}
}
