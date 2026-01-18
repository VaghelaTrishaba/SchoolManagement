<?php

namespace App\Http\Controllers\API;

use App\Models\Medium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MediumController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Medium::all();
        return  response()->json(["Messsage"=>$data]);
    }
    
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               'name'=>'required'
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

       $data = Medium::create([
            'user_id' => auth()->id(),
            'name'=> $request->name,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    
    }

   
    public function show(string $id)  // fetch one record
    {
        $data['medium']=Medium::select('user_id','id','name')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }


    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
                'name'=> 'required',
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

    

        $post=Medium::where('id',$id)->update([
            'name' => $request->name,
        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated',]);
    }

   
    public function destroy(string $id)
    {
        $post = Medium::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }

}
?>