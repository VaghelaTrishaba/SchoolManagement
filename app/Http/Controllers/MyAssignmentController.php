<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Assignment;

class MyAssignmentController extends Controller
{
     public function myAssignments()
    {
        $grNumber = session('student_gr'); // ✅ CORRECT

        if (!$grNumber) {
            return 'Session expired. Please login again.';
        }

        $assignments = Assignment::where('grNumber', $grNumber)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('studentadmin.myassignment', compact('assignments'));
    }
}

