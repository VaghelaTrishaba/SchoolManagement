<?php 

namespace App\Http\Controllers;

use App\Models\Assgin;
use Illuminate\Http\Request;

class NewController extends Controller{
    public function new()
    {
        if (!session()->has('student_id')) {
            return redirect('/loginStudent');
        }

        $studentId = session('student_id');

        $assignments = Assgin::orderBy('date')->get();;

        return view('studentadmin.new', compact('assignments'));
    }
}

?>