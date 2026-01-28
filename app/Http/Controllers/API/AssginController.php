<?php

namespace App\Http\Controllers\API;

use App\Models\Assgin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AssginController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Assgin::all();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
                'subject'=>'required',
                'file'=>'required|mimes:pdf,doc,docx|max:2048',
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

        $fileName = time().'_'.$request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('assign'), $fileName);

        $data = Assgin::create([
           'subject'=>$request->subject,
           'file'=>$fileName,
           'date'=>$request->date,
        ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['assgin']=Assgin::select('id','subject','file','date')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

     public function destroy(string $id)
    {
        $post = Assgin::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }
}

?>