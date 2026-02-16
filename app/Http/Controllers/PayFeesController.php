<?php

namespace App\Http\Controllers;


use App\Models\PayFees;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class PayFeesController extends Controller
{
    public function create(Request $request)
    {
        $studentName = session('student_name');

        if (!$studentName) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $alreadyPaid = PayFees::where('name', 'LIKE', '%'.$studentName.'%')
            ->where('name', $request->name)
            ->where('amount', $request->amount)
            ->exists();

        return view('studentadmin.payfees', [
            'alreadyPaid' => $alreadyPaid,
            'student' => (object)['name' => $studentName],
            'feeName' => $request->name,
            'amount' => $request->amount
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amount'  => 'required',
            'mode'=> 'required',
        ]);

        $exists = PayFees::where('name', 'LIKE', '%'.$request->name.'%')
            ->where('name', $request->name)
            ->where('amount', $request->amount)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This fee is already paid');
        }


        $fee = PayFees::create([
                'name'  => $request->name,
                'amount'=> $request->amount,
                'mode' => $request->mode,
        ]);

        if ($request->mode === 'Online') {
            return redirect()->route('fees.pay', $fee->id);
        }

        return view('studentadmin.feesDetail')->with('success', 'Payment Done!!');
    }
}
