<?php

namespace App\Http\Controllers\API;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Exam::with('class')->get();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
                'class_id' => 'required|exists:classes,id',
                'subject'=>'required',
                'marks'=>'required',
                'duration'=>'required',
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


        $data = Exam::create([
           'class'=>$request->class_id,
           'subject'=>$request->subject,
           'marks'=>$request->marks,
           'duration'=>$request->duration,
        ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['exam']=Exam::select('class_id','id','subject','marks','duration')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

     public function destroy(string $id)
    {
        $post = Exam::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }
}

?>