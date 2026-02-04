<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PayFees;

class MyFeesController extends Controller
{
     public function myfees()
    {
        $name = session('student_name');

        if (!$name) {
            return 'Session expired. Please login again.';
        }

        $fees = payFees::where('name', $name)->get();

        return view('studentadmin.feesDetail', compact('fees'));
    }
}

