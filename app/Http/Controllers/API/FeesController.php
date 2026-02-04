<?php

namespace App\Http\Controllers\API;

use App\Models\Fees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FeesController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Fees::with('class')->get();
        return  response()->json(["Message"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
        $request->all(),
     [
                'class_id' => 'required|exists:classes,id',
                'name'=>'required',
                'amount'=>'required',
                'status'=>'required',
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

        $data = Fees::create([
           'class_id'=>$request->class_id,
           'name'=>$request->name,
           'amount'=>$request->amount,
           'status'=>$request->status,
        ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {

        $data['fees']=Fees::select('class_id','id','name','amount','status')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function totalFeesByClass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required|exists:classes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $fees = Fees::where('class_id', $request->class_id)->where('status', 'compulsory')->get();

        $totalFees = $fees->sum('amount');

        return response()->json([
            'status' => true,
            'class_id' => $request->class_id,
            'total_fees' => $totalFees,
            'fees_list' => $fees
        ]);
    }

}

?>