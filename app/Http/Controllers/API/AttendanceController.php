<?php

namespace App\Http\Controllers\API;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        $data = Attendance::with('admission')->get();
        return response()->json(["Message" => $data]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'roll' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Message' => 'Validator error',
                'status' => false,
                'error' => $validator->errors()->first(),
            ]);
        }

        $attendance = Attendance::create([
            'roll' => $request->roll,
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return response()->json([
            'status' => 200,
            'data'=>$attendance,
            'Message' => 'Attendance marked successfully'
        ]);
    }
    public function show(string $id)
    {
        $attendance = Attendance::with('admission')->find($id);
        return response()->json(['Message' => $attendance]);
    }

    public function destroy(string $id)
    {
        Attendance::findOrFail($id)->delete();
        return response()->json(['status' => 'Deleted successfully']);
    }
}
