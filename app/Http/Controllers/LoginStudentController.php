<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admission;

class LoginStudentController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'grNumber'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $student = Admission::where('firstName', $request->firstName)
                            ->where('grNumber', $request->grNumber)
                            ->first();

        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Name or GR Number'
            ], 401);
        }

        session([
            'student_logged_in' => true,
            'student_id'        => $student->id,
            'student_name'      => $student->firstName,
            'student_gr'        => $student->grNumber
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Login successful'
        ]);
    }

    public function logout()
    {
        session()->forget([
            'student_logged_in',
            'student_id',
            'student_name',
            'student_gr'
        ]);

        return response()->json(['message' => 'Logged out']);
    }
}
?>