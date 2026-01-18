<?php

namespace App\Http\Controllers\API;

use App\Models\SubjectTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubjectTeacherController extends Controller
{
    public function index() //fetch data from post
    {
        $data = SubjectTeacher::with('class','subject','teacher')->get();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               'class_id' => 'required|exists:classes,id',
               'subject_id'=> 'required|exists:subjects,id',
               'teacher_id'=> 'required|exists:teachers,id',
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

       $data = SubjectTeacher::create([
            'class_id' => $request->class_id,
            'subject_id'=> $request->subject_id,
            'teacher_id'=> $request->teacher_id,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['subteacher']=SubjectTeacher::select('class_id','subject_id','teacher_id','id')->with('class','subject','teacher')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
                'class_id' => 'required|exists:classes,id',
                'subject_id'=> 'required|exists:subjects,id',
                'teacher_id'=> 'required|exists:teachers,id',
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

        $post=SubjectTeacher::where('id',$id)->update([
            'class_id' => $request->class_id,
            'subject_id'=> $request->subject_id,
            'teacher_id'=> $request->teacher_id,
        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated']);
    }

    public function destroy(Request $request)
    {
        $post = SubjectTeacher::where('class_id', $request->class_id)
        ->where('teacher_id', $request->teacher_id)
        ->where('subject_id', $request->subject_id)
        ->first();

        if (!$post) {
            return response()->json([
            'status' => false,
            'message' => 'Record not found'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }
}
?>