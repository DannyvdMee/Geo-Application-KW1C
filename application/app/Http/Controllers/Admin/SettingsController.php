<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $user = Auth::user();
 
        $departments = Department::where('active', '=', 1)->get();

        return view('admin/settings/index', ['user' => $user, 'departments' => $departments]);
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
        $user = Auth::user();

		$user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        
        $user->department = $request->department;

		$user->save();

        return redirect('admin/settings');
    }

    public function changePassword(Request $request) {
        $user = Auth::user();

        if (Hash::check($request->oldpassword, $user->password)) {
            echo 'Passwords are the same';
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                echo 'changed password';

                $user->save();

                return redirect('admin/settings');
            }
        }
    }
}
