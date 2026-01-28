<?php

namespace App\Http\Controllers\API;

use App\Models\AddTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddTeacherController extends Controller
{
    public function index() //fetch data from post
    {
        $data = AddTeacher::all();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               
               'firstName'=>'required',
               'secondName'=>'required',
               'gender'=>'required|in:male,female',
               'email'=>'required',
               'mobile'=>'required',
               'image'=>'nullable|image|mimes:jpg,jpeg,png',
               'birth'=>'required',
               'qualification'=>'required',
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

       $img = $request->image;     //tack image name
       $ext = $img-> getClientOriginalExtension();   //tack thier extension
       $image = time(). '.' .$ext;     //convert there name first corrent time and then extension
       $img -> move(public_path().'/uploads', $image); //move in my  folder public folder ecreate uplode and save in them

       $data = AddTeacher::create([
           'firstName'=>$request->firstName,
           'secondName'=>$request->secondName,
           'gender'=>$request->gender,
           'email'=>$request->email,
           'mobile'=>$request->mobile,
           'image'=>$image,
           'birth'=>$request->birth,
           'qualification'=>$request->qualification,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['addteacher']=AddTeacher::select('id','firstName','secondName','gender','email','mobile','image','birth','qualifiaction')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
                'firstName'=>'required',
                'secondName'=>'required',
                'gender'=>'required|in:male,female',
                'email'=>'required',
                'mobile'=>'required',
                'image'=>'nullable|image|mimes:jpg,jpeg,png',
                'birth'=>'required',
                'qualification'=>'required',
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

        $img = $request->image;     //tack image name
        $ext = $img-> getClientOriginalExtension();   //tack thier extension
        $image = time(). '.' .$ext;     //convert there name first corrent time and then extension
        $img -> move(public_path().'/uploads', $image); //move in my  folder public folder ecreate uplode and save in them

        $post=AddTeacher::where('id',$id)->update([
            'firstName'=>$request->firstName,
            'secondName'=>$request->secondName,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'image'=>$image,
            'birth'=>$request->birth,
            'qualification'=>$request->qualification,
        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated']);
    }

     public function destroy(string $id)
    {
        $post = AddTeacher::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }

}

?>