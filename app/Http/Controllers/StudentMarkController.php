<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mark;

class StudentMarkController extends Controller
{
     public function mark()
    {
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $student = Mark::find($studentId);

        if (!$student) {
            return redirect('/loginStudent')->with('error', 'Student not found');
        }

        $marks = Mark::where('student_id', $studentId)->get();

        return view('studentadmin.mark', compact('marks'));
    }
}