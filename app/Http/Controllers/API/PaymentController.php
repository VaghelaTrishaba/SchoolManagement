<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\PayFees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $data = PayFees::select(
            'id',
            'name',
            'amount',
            'mode',
            DB::raw('DATE(created_at) as payment_date')
        )->get();

        return response()->json(["Message" => $data]);
    }

    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
        $request->all(),
     [
                'name'=>'required',
                'amount'=>'required',
                'mode'=>'required',
            ]
       );

       if ($ValidateUser->fails())
       {
         return response()->json([
            'message'=>'Validator error',
            'status'=>false,
            'error'=> $ValidateUser->errors()->first(),
         ]);
       }

        $data = PayFees::create([
            'name'=>$request->name,
            'amount'=>$request->amount,
            'mode'=>$request->mode,
        ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)
    {
        $payfees = PayFees::find($id);

        if (!$payfees) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json([
            'id' => $payfees->id,
            'name' => $payfees->name,
            'amount' => $payfees->amount,
            'mode' => $payfees->mode,
            'date' => Carbon::parse($payfees->created_at)->format('d-m-Y'),
        ]);
    }
}
