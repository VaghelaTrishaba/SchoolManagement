<?php

namespace App\Http\Controllers\API;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Classes::get();
        return  response()->json(["Messsage"=>$data]);
    }
    
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               'name'=>'required',
               'medium'=>'required',
               'stream'=>'required',
               'section'=>'required',
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

       $data = Classes::create([
            'user_id' => auth()->id(),
            'name'=> $request->name,
            'medium'=>$request->medium,
            'stream'=> $request->stream,
            'section'=>$request->section,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    
    }

   
    public function show(string $id)  // fetch one record
    {
        $data['class']=Classes::select('user_id','id','name','medium','stream','section')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
                'name'=> 'required',
                'medium'=>'required',
                'stream'=>'required',
                'section'=>'required',
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

        $post=Classes::where('id',$id)->update([
            'name' => $request->name,
            'medium'=> $request->medium,
            'stream'=> $request->stream,
            'section'=> $request->section,
        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated',]);
    }
   
    public function destroy(string $id)
    {
        $post = Classes::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }
}
?>