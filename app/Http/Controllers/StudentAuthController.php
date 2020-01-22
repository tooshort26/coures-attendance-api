<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function login(Request $request)
    {
        $student = Student::where('id_number', $request->id_number)
                            ->first();
        if(!is_null($student) && Hash::check($request->password, $student->password)) {
            return response()->json(['message' => 'Succesfully login.', 'credentials' => $student], 200);
        }
        return response()->json(['message' => 'Please check your id number or password.'], 403);
    }
}
