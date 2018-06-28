<?php

namespace App\Http\Controllers\Teacher;

use Auth;   
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //IS DEZE BITCH INGELOGD
        $user = Auth::user();

        $departments = Department::where('active', '=', 1)->get();

        //ALS DIE BITCH IS INGELOGD:
        //DAN DIE USER, ZET DAAR DE USER ACHTER
        return view('teacher/settings/index', ['user' => $user, 'departments' => $departments]);
    }
}
