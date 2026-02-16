<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\PayFees;
use Illuminate\Http\Request;

class StudentFeesController extends Controller
{
    public function fees()
    {
        $studentId = session('student_id');
        $studentName = session('student_name');

        if (!$studentId) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $student = Fees::find($studentId);

        if (!$student) {
            return redirect('/loginStudent')->with('error', 'Student not found');
        }

        $classId = $student->class_id;

        $fees = Fees::where('class_id', $classId)->get();

        $paidFees = PayFees::where('name', 'LIKE', '%['.$studentName.']%')->get()
        ->map(function ($item) {
        $feeName = trim(strstr($item->name, '[', true));
        return $feeName . '-' . $item->amount;
    })
    ->toArray();

        return view('studentadmin.fees', compact('fees','paidFees'));
    }
}
