<?php

use App\Http\Controllers\API\AllStudController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\SubController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\LoginStudentController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MyAssignmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function()
{
    return view('home');
});

Route::get('/stream',function(){return view('acadamic/stream');});
Route::get('/edit',function(){return view('acadamic/class-subject-edit');});
Route::get('/teacher',function(){return view('acadamic/teacher');});
Route::get('/parents',function() {return view('parents/parents');});

Route::controller(pageController::class)->group(
    function (){
        Route::get('/','showLogin');
        Route::get('/gellery','showGallery');
        Route::get('/about','showAbout');
        Route::get('/home','showHome');    
        Route::get('/assginclass','showAssginClass');
        Route::get('/assginclassTeacher','showAssginTeacher');
        Route::get('/assginsubteacher','showAssginsubTeacher');
        Route::get('/stream','showStream');
        Route::get('/class','showClass');
        Route::get('/medium','showMedium');
        Route::get('/section','showSection');
        Route::get('/addteacher','showAddTeacher');
        Route::get('/details','showTeacherDetails');
        Route::get('/admission','showStudentAdmission');
        Route::get('/studdetails','showStudentDetails');
        Route::get('/rolesPermission','showRolPermission');
        Route::get('/staff','showStaff');
        Route::get('/assginment','showAssgin');
        Route::get('/allassginment','showAllAssgin');
        Route::get('/exam','showExam');
    }
);


Route::get('/loginStudent',function(){return view('studentadmin/login');});
Route::get('/student/dashboard', [StudentDashboardController::class, 'dashboard']);
Route::post('/studentlogin', [LoginStudentController::class, 'login']);
Route::get('/student/subject/{class_id?}',[SubController::class,'subject'])->name('student.subject');
Route::get('/student/assignment', [AssignmentController::class, 'create'])->name('student.assignment');
Route::post('/student/assignment-submit', [AssignmentController::class, 'store'])->name('student.store');
Route::get('/student/my-assignments', [MyAssignmentController::class, 'myAssignments'])->name('student.myassignment');
Route::get('/student/new',[NewController::class,'new'])->name('student.new');