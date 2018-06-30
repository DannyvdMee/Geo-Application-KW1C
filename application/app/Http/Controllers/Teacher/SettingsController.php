<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;   
use App\Department;
use App\User;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //actieve user
        $user = Auth::user();

        //alle actieve departments 
        $departments = Department::where('active', '=', 1)->get();

        return view('teacher/settings/index', ['user' => $user, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request/*, $id */)
    {
        // $user = User::find($id);

        $user = Auth::user();

		$user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        
        $user->department = $request->department;

		$user->save();

        return redirect('teacher/settings');
        
    }

}
