<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Exam;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;

class StudentQuestionController extends Controller
{
    public function question()
    {
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect('/loginStudent')->with('error', 'Session expired');
        }

        $student = Exam::find($studentId);

        if (!$student) {
            return redirect('/loginStudent')->with('error', 'Student not found');
        }

        $classId = $student->class_id;

        $exams = Question::where('class_id', $classId)->get();

        return view('studentadmin.questionpaper', compact('exams'));
    }

    public function submitAnswers(Request $request)
    {
        $studentId = session('student_id');

        if (!$studentId) {
            return redirect('/loginStudent');
        }

        // answers[question_id] => value
        foreach ($request->answers as $questionId => $answer) {
            StudentAnswer::create([
                'student_id' => $studentId,
                'question_id' => $questionId,
                'answer' => $answer,
            ]);
        }

        return redirect()->back()->with('success', 'Answers submitted successfully');
    }
}
