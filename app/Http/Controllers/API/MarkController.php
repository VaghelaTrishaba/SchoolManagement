<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\Mark;

class MarkController extends Controller
{
    public function index()
    {
        $data = Mark::all();
        return  response()->json(['data'=>$data]);
    }

    public function store(Request $request)
    {
        $students = StudentAnswer::with('question')->get()->groupBy('student_id');

        $results = [];

        foreach ($students as $studentId => $answers) {

            $classMarks = [];

            foreach ($answers as $answer) {

                if (!$answer->question) continue;

                $classId = $answer->question->class_id;

                if (!isset($classMarks[$classId])) {
                    $classMarks[$classId] = 0;
                }

                //compair answer with correct answer
                if (trim($answer->answer) == trim($answer->question->correct_answer)) {
                    $classMarks[$classId] += 2;
                }
            }

            foreach ($classMarks as $classId => $marks) {

            Mark::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'class_id'   => $classId,
                ],
                [
                    'marks' => $marks
                ]
            );
        }
    
        }

        return response()->json([
            'status' => true,
            'message' => 'Marks stored successfully'
        ]);
    }


    public function show($id)
    {
        return response()->json([
            'message' => 'Not implemented'
        ]);
    }

    public function update(Request $request, $id)
    {
        return response()->json([
            'message' => 'Not implemented'
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Not implemented'
        ]);
    }
}
