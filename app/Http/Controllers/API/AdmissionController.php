<?php

namespace App\Http\Controllers\API;

use App\Models\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdmissionController extends Controller
{
    public function index() //fetch data from post
    {
        $data = Admission::all();
        return  response()->json(["Messsage"=>$data]);
    }
    public function store(Request $request) //add data in post
    {
       $ValidateUser = Validator::make(
            $request->all(),
     [
               
               'firstName'=>'required',
               'secondName'=>'required',
               'mobile'=>'required',
               'gender'=>'required|in:male,female',
               'image'=>'nullable|image|mimes:jpg,jpeg,png',
               'birth'=>'required',
               'category'=>'required',
               'grNumber'=>'required',
               'admissionDate'=>'required',
               'fatherName'=>'required',
               'fatherMobile'=>'required',
               'fatherImage'=>'nullable|image|mimes:jpg,jpeg,png',
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

        $imageName = null;
        if ($request->hasFile('image')) {
        $img = $request->file('image');
        $imageName = time().'_student.'.$img->getClientOriginalExtension();
        $img->move(public_path('uploads'), $imageName);
        }

        // Father image
        $fimg = $request->file('fatherImage');
        $fatherImageName = time().'_father.'.$fimg->getClientOriginalExtension();
        $fimg->move(public_path('uploads'), $fatherImageName);
        
       $data = Admission::create([
           'firstName'=>$request->firstName,
           'secondName'=>$request->secondName,
           'mobile'=>$request->mobile,
           'gender'=>$request->gender,
           'image'=>$imageName,
           'birth'=>$request->birth,
           'category'=>$request->category,
           'grNumber'=>$request->grNumber,
           'admissionDate'=>$request->admissionDate,
           'fatherName'=>$request->fatherName,
           'fatherMobile'=>$request->fatherMobile,
           'fatherImage'=>$fatherImageName,
       ]);

       return response()->json(['Data'=>$data,'message'=> 'Data Add Successfully']);
    }
   
    public function show(string $id)  // fetch one record
    {
        $data['admission']=Admission::select('id','firstName','secondName','mobile','gender','image','birth','category','grNumber','admissionDate','fatherName','fatherMobile','fatherImage')->where(['id' => $id])->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $ValidationUser = Validator::make(
            $request->all(),
     [
               'firstName'=>'required',
               'secondName'=>'required',
               'mobile'=>'required',
               'gender'=>'required|in:male,female',
               'image'=>'nullable|image|mimes:jpg,jpeg,png',
               'birth'=>'required',
               'category'=>'required',
               'grNumber'=>'required',
               'admissionDate'=>'required',
               'fatherName'=>'required',
               'fatherMobile'=>'required',
               'fatherImage'=>'nullable|image|mimes:jpg,jpeg,png',
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

        if ($request->hasFile('image')) {
        $img = $request->file('image');
        $imageName = time().'_student.'.$img->getClientOriginalExtension();
        $img->move(public_path('uploads'), $imageName);
        }

        // Father image
        $fimg = $request->file('fatherImage');
        $fatherImageName = time().'_father.'.$fimg->getClientOriginalExtension();
        $fimg->move(public_path('uploads'), $fatherImageName);

        $post=Admission::where('id',$id)->update([
           'firstName'=>$request->firstName,
           'secondName'=>$request->secondName,
           'mobile'=>$request->mobile,
           'gender'=>$request->gender,
           'image'=>$imageName,
           'birth'=>$request->birth,
           'category'=>$request->category,
           'grNumber'=>$request->grNumber,
           'admissionDate'=>$request->admissionDate,
           'fatherName'=>$request->fatherName,
           'fatherMobile'=>$request->fatherMobile,
           'fatherImage'=>$fatherImageName,

        ]);

        return response()->json(['post'=>$post,'message'=> 'Data  Updated']);
    }

     public function destroy(string $id)
    {
        $post = Admission::find($id);

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Deleted Successfully'
        ]);
    }

}

?>