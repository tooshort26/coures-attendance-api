<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function store(Request $request) :Student
    {
    	return Student::firstOrCreate(
    		[
    			'id_number' => $request->id_number
    		],
    		$request->all()
    	);
    }

    public function show(int $id) : Student
    {
    	return Student::find($id);
    }
}
