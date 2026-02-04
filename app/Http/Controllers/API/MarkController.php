<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\StudentAnswer;
use App\Models\Question;

class MarkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'class_id'   => 'required',
        ]);

        $studentId = $request->student_id;
        $classId   = $request->class_id;

        $answers = StudentAnswer::where('student_id', $studentId)->get();
        $totalMarks = 0;

        foreach ($answers as $answer) {
            $question = Question::find($answer->question_id);

            if ($question && $answer->answer == $question->correct_answer) {
                $totalMarks += 2; 
            }
        }

        $mark = Mark::updateOrCreate(
            [
                'student_id' => $studentId,
                'class_id'   => $classId,
            ],
            [
                'marks' => $totalMarks,
            ]
        );

        return response()->json([
            'status' => true,
            'data'   => $mark
        ]);
    }

    public function index()
    {
        $mark = Mark::all();

        return response()->json(['data'=>$mark]);
    }
}
