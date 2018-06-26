<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Route;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$routes = Route::where('active', '=', 1)->get();

        return view('teacher/route/index', ['routes' => $routes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/route/create');
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
        $route = new Route;

        $route->url_id = bin2hex(random_bytes(4));
        $route->title = $request->title;
        $route->active = TRUE;
        $route->user_id = Auth::user()->id;

        $route->save();

        return view('teacher/route/index');
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
		$route = Route::find($id);

		if ($route->visibility == 1) {
			$visibility = 0;
		} else if ($route->visibility == 0) {
			$visibility = 1;
		}

		$route->visibility = $visibility;

		$route->save();
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
		$route = Route::find($id);

		return view('teacher/route/edit');
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
        $route = Route::find($id);

		$route->title = $request->title;
		$route->user_id = Auth::user()->id;

		$route->save();
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
        $route = Route::find($id);

        $route->active = FALSE;

        $route->save();

        return view('teacher/route/index');
    }
}
