<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Question::with('class')->get();
        return  response()->json(["Message"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
        $request->all(),
     [
                'class_id' => 'required|exists:classes,id',
                'subject'=>'required',
                'question'=>'required',
                'option_a'=>'required',
                'option_b'=>'required',
                'option_c'=>'required',
                'option_d'=>'required',
                'correct_option'=>'required',
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


        $data = Question::create([
           'class_id'=>$request->class_id,
           'subject'=>$request->subject,
           'question'=>$request->question,
           'option_a'=>$request->option_a,
           'option_b'=>$request->option_b,
           'option_c'=>$request->option_c,
           'option_d'=>$request->option_d,
           'correct_option'=>$request->correct_option,
        ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['question']=Question::select('class_id','id','subject','question','option_a','option_b','option_c','option_d','correct_option')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

     public function destroy(string $id)
    {
        $post = Question::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }
}

?>