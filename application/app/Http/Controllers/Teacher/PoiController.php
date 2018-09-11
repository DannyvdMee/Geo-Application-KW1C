<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Poi\PoiRepository;

class PoiController extends Controller
{
	private $poi;

	public function __construct(PoiRepository $poi)
	{
		$this->poi = $poi;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher/poi/index', ['pois' => $this->poi->getAllActive()]);
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
//    	TODO create PoiReqyest

		$request_collection = collect($request->all());

        $request_collection->put('url_id', bin2hex(random_bytes(40)));

        $this->poi->store($request_collection->toArray());

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
		$poi = $this->poi->getOne($id);

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
        $poi = $this->poi->getOne($id);

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
        $this->poi->update($request->all(), $id);

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

//		TODO fix this shit

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
		$poi = $this->poi->getOne($id);

		$poi->active = 0;

		$poi->save();

        return redirect('teacher/poi');
    }
}
