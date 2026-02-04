<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;

class StudentFeesController extends Controller
{
    public function fees()
    {
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $student = Fees::find($studentId);

        if (!$student) {
            return redirect('/loginStudent')->with('error', 'Student not found');
        }

        $classId = $student->class_id;

        $fees = Fees::where('class_id', $classId)->get();

        return view('studentadmin.fees', compact('fees'));
    }
}
