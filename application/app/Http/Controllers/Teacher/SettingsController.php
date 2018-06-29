<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;   
use App\Department;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $departments = Department::where('active', '=', 1)->get();

        return view('teacher/settings/index', ['user' => $user, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;

		$user->save();

		return redirect('teacher/dashboard');
    }

}
