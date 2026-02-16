<?php

namespace App\Http\Controllers;

use App\Models\PayFees;

class MyFeesController extends Controller
{
    public function myfees()
    {
        $studentName = session('student_name');

        if (!$studentName) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $fees = PayFees::where('name', 'LIKE', '%'.$studentName.'%')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('studentadmin.feesDetail', compact('fees'));
    }
}
