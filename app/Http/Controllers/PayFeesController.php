<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayFees;
use Psy\Readline\Hoa\Console;

class PayFeesController extends Controller
{
    public function create()
    {
        return view('studentadmin.payfees');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amount'  => 'required',
            'mode'=> 'required',
        ]);

        PayFees::create([
            'name'  => $request->name,
            'amount'=> $request->amount,
            'mode' => $request->mode,
        ]);

        return redirect()->back()->with('success', 'Payment Done!!');
    }
}
