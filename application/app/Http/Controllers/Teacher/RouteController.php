<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Route;
use App\Poi;

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
    	$pois = Poi::where('active', '=', 1)->get();

        return view('teacher/route/create', ['pois' => $pois]);
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
        $route->name = $request->name;
        $route->active = $request->active;

        $route->user_id = Auth::user()->id;

        $route->save();

		$poi_id_array = [];

		foreach ($request->pois as $poi) {
			$poi_id_array[] = $poi;
		}

		$pois = Poi::find($poi_id_array);

		$route->pois()->attach($pois);

        return redirect('teacher/route');
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
        
        return redirect('teacher/route');
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

        return view('teacher/route/edit', ['route' => $route]);
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

        $route->name = $request->name;
        $route->active = $request->active;
        
        // Remove this and below line if app has login
        $route->user_id = 1;
		// $route->user_id = Auth::user()->id;

        $route->save();
        
        return redirect('teacher/route');
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

        $route->active = 0;

        $route->save();

        return redirect('teacher/route');
    }
}
