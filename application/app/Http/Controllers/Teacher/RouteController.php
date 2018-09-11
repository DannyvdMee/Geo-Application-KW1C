<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Route\RouteRepository;
use App\Repositories\Poi\PoiRepository;

class RouteController extends Controller
{
	private $poi;
	private $route;

	public function __construct(RouteRepository $route, PoiRepository $poi)
	{
		$this->poi = $poi;
		$this->route = $route;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher/route/index', ['routes' => $this->route->getAllActive()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher/route/create', ['pois' => $this->poi->getAllActive()]);
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
//    	TODO create RouteRequest

		$request_c9llection = collect($request->all());
        $route = new Route;

        $request_c9llection->put('url_id', bin2hex(random_bytes(4)));
        $request_c9llection->put('user_id', Auth::user()->id);

        $this->route->store($request_c9llection->toArray());

		$poi_id_array = [];

		foreach ($request->pois as $poi) {
			$poi_id_array[] = $poi;
		}

		$route->pois()->attach($this->poi->getOne($poi_id_array));

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
		$route = $this->route->getOne($id);

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
        return view('teacher/route/edit', ['route' => $this->route->getOne($id)]);
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
    	$request_collectiob = collect($request->all());

		$request_collectiob->put('user_id', Auth::user()->id);

        $this->route->update($request_collectiob->toArray(), $id);
        
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
        $route = $this->route->getOne($id);

        $route->active = 0;

        $route->save();

        return redirect('teacher/route');
    }
}
