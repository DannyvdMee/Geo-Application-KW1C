<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Department;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::where('active', '=', 1)->orderBy('lastname', 'asc')->get();

		$departments = Department::where('active', '=', 1)->get();

		return view('admin/user/index',  ['users' => $users, 'departments' => $departments]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$departments = Department::where('active', '=', 1)->get();

		return view('admin/user/create', ['departments' => $departments]);
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
		$user = new User;

		$user->email = $request->email;
		$user->username = $request->username;
		$user->password = Hash::make($request->password);

		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;

		$user->department = $request->department;
		$user->active = $request->active;

		$user->save();

		return redirect('admin/user');
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
		$user = User::find($id);

		if ($user->visibility == 1) {
			$visibility = 0;
		} else if ($user->visibility == 0) {
			$visibility = 1;
		}

		$user->visibility = $visibility;

        $user->save();
        
        return redirect('admin/user');
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
		$user = User::find($id);
		
		$departments = Department::where('active', '=', 1)->get();

        return view('admin/user/edit', ['user' => $user, 'departments' => $departments]);
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
		$user = User::find($id);

		$user->email = $request->email;
		$user->username = $request->username;

		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->department = $request->department;

		$user->active = $request->active;

		$user->save();

		return redirect('admin/user');
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
		$user = User::find($id);

		$user->active = 0;

		$user->save();

        return redirect('admin/user');
	}
	
}
