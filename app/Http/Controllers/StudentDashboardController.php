<?php 

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller{
public function dashboard()
{
    if (!session()->has('student_id')) {
        return redirect('/loginStudent');
    }

    $student = Admission::findOrFail(session('student_id'));

    return response()
        ->view('studentadmin/dashboard', compact('student'))
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache');
}
}

?>