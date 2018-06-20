<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
	public function approveDepartment($department){

		// Here a SQL search is done to search for the department and set it it's active state on true

		$resultCreatePrefix = $this->creatingPrefix($department);

	}

	public function overviewDepartment(){
		$avalibleDepartments = [
			'Kappersopleiding' => true,
			'ICT-Academie' => false,
			'TheaterOpleiding' => false
		];

		return $avalibleDepartments;
	}

	public function editApprovementDepartment(){

	}

	public function creatingPrefix($department){

	}
}
