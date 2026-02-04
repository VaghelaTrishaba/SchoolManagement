<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomNotificationController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Notification::all();
        return  response()->json(["Message"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
                'title'=>'required',
                'message'=>'required',
                'date'=>'required',
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


        $data = Notification::create([
           'title'=>$request->title,
           'message'=>$request->message,
           'date'=>$request->date,
        ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['notification']=Notification::select('id','title','message','date')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

     public function destroy(string $id)
    {
        $notification = Notification::find($id);

        $notification->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }
}

?>