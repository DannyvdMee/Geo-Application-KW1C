<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poi;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pois = Poi::where('active', '=', TRUE)->get();

        return view('teacher/poi/index', ['pois' => $pois]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/poi/create');
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
        $poi = new Poi();

        $uid = bin2hex(random_bytes(40));

        $poi->url_id = $uid;
        $poi->title = $request->name;
        $poi->latitude = $request->latitude;
        $poi->longitude = $request->longitude;

        if (!empty($request->hint)) {
			$poi->hint = $request->hint;
		}

		$poi->active = $request->active;

		$poi->save();

        return view('teacher/poi/index');
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
		$poi = Poi::find($id);

		if ($poi->visibility == 1) {
			$visibility = 0;
		} else if ($poi->visibility == 0) {
			$visibility = 1;
		}

		$poi->visibility = $visibility;

		$poi->save();
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
        $poi = Poi::find($id);

        return view('teacher/poi/edit', ['poi' => $poi]);
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
        $poi = Poi::find($id);

		$poi->title = $request->title;
		$poi->latitude = $request->latitude;
		$poi->longitude = $request->longitude;

		if (!empty($request->hint)) {
			$poi->hint = $request->hint;
		}

		if (!empty($request->photo)) {
			$poi->photo = $request->photo;
		}

		$poi->save();

		return view('teacher/poi/index');
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
		$poi = Poi::find($id);

		$poi->active = FALSE;

		$poi->save();

        return view('teacher/poi/index');
    }
}
