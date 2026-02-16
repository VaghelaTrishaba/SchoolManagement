<?php 

namespace App\Http\Controllers;

use App\Models\Subject;


class SubController extends Controller{
public function subject($class_id = 1)
{

    $subject = Subject::where('class_id', $class_id)->firstOrFail();

    return view('studentadmin.subject', compact('subject'));
}

}
?>