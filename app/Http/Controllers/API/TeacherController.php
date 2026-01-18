<?php

namespace App\Http\Controllers\API;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Teacher::with('class')->get();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               'class_id' => 'required|exists:classes,id',
               'name'=>'required',
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

       $data = Teacher::create([
            'class_id' => $request->class_id,
            'name'=> $request->name,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['teacher']=Teacher::select('class_id','id','name')->with('class')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
                'class_id' => 'required|exists:classes,id',
                'name'=>'required',
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

        $post=Teacher::where('id',$id)->update([
            'class_id' => $request->class_id,
            'name'=> $request->name,
        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated']);
    }
}

?>