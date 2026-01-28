<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use Psy\Readline\Hoa\Console;

class AssignmentController extends Controller
{
    public function create()
    {
        return view('studentadmin.assignment');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'file'  => 'required|mimes:pdf,doc,docx|max:2048'
    ]);

    $student = \App\Models\Admission::find(session('student_id'));

    if (!$student) {
        return redirect('/loginStudent')->with('error', 'Session expired');
    }

    $fileName = time().'_'.$request->file('file')->getClientOriginalName();
    $request->file('file')->move(public_path('assignments'), $fileName);

    Assignment::create([
        'name'     => $student->firstName,
        'grNumber' => $student->grNumber,
        'title'    => $request->title,
        'file'     => $fileName,
    ]);

    return redirect()->back()->with('success', 'Assignment submitted successfully!');
}
}
