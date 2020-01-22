<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth', ['except' => ['store']]);
    }

    public function store(Request $request)
    {
    	 $student = Student::firstOrCreate(
    		[
    			'id_number' => $request->id_number
    		],
    		$request->all()
    	);
        if (! $token = Auth::attempt(['id_number' => $student->id_number , 'password' => $request->password] )) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }          
         return $this->respondWithToken($token);
    }

    public function show(int $id) : Student
    {
    	return Student::find($id);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

     /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
     protected function respondWithToken($token)
     {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
     }
}
