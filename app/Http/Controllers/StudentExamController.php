<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Exam;

class StudentExamController extends Controller
{
     public function exam()
    {
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $student = Exam::find($studentId);

        if (!$student) {
            return redirect('/loginStudent')->with('error', 'Student not found');
        }

        $classId = $student->class_id;

        $exams = Exam::where('class_id', $classId)
            ->orderBy('date', 'desc')
            ->get();

        return view('studentadmin.exam', compact('exams'));
    }
}


