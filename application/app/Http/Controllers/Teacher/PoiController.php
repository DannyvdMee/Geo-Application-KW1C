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
        $pois = Poi::where('active', '=', 1)->get();

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
        $poi->name = $request->name;
        $poi->latitude = $request->latitude;
        $poi->longitude = $request->longitude;
        $poi->description = $request->description;
		$poi->active = $request->active;
		$poi->hint = $request->hint;
        
		$poi->save();

        return redirect('teacher/exercise/create');
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
        
        return redirect('teacher/poi');
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

		$poi->name = $request->name;
		$poi->latitude = $request->latitude;
        $poi->longitude = $request->longitude;
        $poi->active = $request->active;
        $poi->description = $request->description;
		$poi->hint = $request->hint;


		$poi->save();

		return redirect('teacher/poi');
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

//		// Remove all empty values inside the data array
//		foreach ($file_array as $data) {
//			$exploded = explode(';', $data[0]);
//			$data_array[] = array_filter($exploded);
//		}
//
//		// Remove all empty array items of the data array itself
//		$data_array = array_filter($data_array);

		$columns_array = [
			0 => 'type',
			1 => 'name',
			2 => 'description',
			3 => 'latitude',
			4 => 'longitude',
			5 => 'hint',
			6 => 'visibility',
			7 => 'active',
		];

		$request->session()->put('db_headers', $columns_array);
		$request->session()->put('file_headers', $filtered_headers_array);
		$request->session()->put('data_array', $file_array);

		return redirect('teacher/poi/import/link');
	}

	public function link(Request $request)
	{
		$db_headers = $request->session()->get('db_headers');
		$sorted_file_headers = $file_headers = $request->session()->get('file_headers');
		$data = $request->session()->get('data_array');
		sort($sorted_file_headers);

		return view('teacher/poi/link', ['db_headers' => $db_headers, 'file_headers' => $file_headers, 'sorted_file_headers' => $sorted_file_headers, 'file_data' => $data]);
	}

	public function processLink(Request $request)
	{
		$file_data_array = [];

		$file_data_array[] = $request->session()->pull('db_headers');
		$data_array = $request->session()->pull('data_array');

		$poi_attributes = $request->pois;

		foreach ($data_array as $data) {
			$poi = new Poi;
			$poi->url_id = bin2hex(random_bytes(40));

			foreach ($poi_attributes as $attribute => $data_index) {
				$poi->$attribute = $data[$data_index];
			}

			$poi->save();
		}

		return redirect('teacher/poi');
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

		$poi->active = 0;

		$poi->save();

        return redirect('teacher/poi');
    }
}
