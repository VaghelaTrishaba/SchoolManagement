<?php

namespace App\Http\Controllers\API;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Subject::with('class')->get();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               'class_id' => 'required|exists:classes,id',
               'sub1'=>'required',
               'sub2'=>'required',
               'sub3'=>'required',
               'sub4'=>'required',
               'sub5'=>'required',
               'sub6'=>'required',
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

       $data = Subject::create([
            'class_id' => $request->class_id,
            'sub1'=> $request->sub1,
            'sub2'=> $request->sub2,
            'sub3'=> $request->sub3,
            'sub4'=> $request->sub4,
            'sub5'=> $request->sub5,
            'sub6'=> $request->sub6,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['subject']=Subject::select('class_id','id','sub1','sub2','sub3','sub4','sub5','sub6')->with('class')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
                'class_id' => 'required|exists:classes,id',
                'sub1'=>'required',
                'sub2'=>'required',
                'sub3'=>'required',
                'sub4'=>'required',
                'sub5'=>'required',
                'sub6'=>'required',
            ]
        );     
        
        if ($ValidationUser->fails())
        {
            return response()->json([
                'message'=> 'Validator Error',
                'status'=>false,
                'error'=> $ValidationUser->errors()->all(),
            ]);
        }

        $post=subject::where('id',$id)->update([
            'class_id' => $request->class_id,
            'sub1'=> $request->sub1,
            'sub2'=> $request->sub2,
            'sub3'=> $request->sub3,
            'sub4'=> $request->sub4,
            'sub5'=> $request->sub5,
            'sub6'=> $request->sub6
        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated']);
    }
}

?>