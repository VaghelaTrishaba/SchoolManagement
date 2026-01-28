<?php

use App\Http\Controllers\StudentDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\MediumController;
use App\Http\Controllers\API\StreamController;
use App\Http\Controllers\API\ClassController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\TeacherController;
use App\Http\Controllers\API\AddTeacherController;
use App\Http\Controllers\API\SubjectTeacherController;
use App\Http\Controllers\API\AdmissionController;
use App\Http\Controllers\LoginStudentController;
use App\Http\Controllers\API\AssginController;
use App\Http\Controllers\API\ExamController;
use App\Http\Controllers\pageController;        


Route::post('signup',[AuthController::class,'signup']);
Route::post('login', [AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::apiResource('sections', SectionController::class);
Route::apiResource('medium',MediumController::class);
Route::apiResource('streams',StreamController::class);
Route::apiResource('class',ClassController::class);
Route::apiResource('subject',SubjectController::class);
Route::apiResource('teacher',TeacherController::class);
Route::apiResource('subteacher',SubjectTeacherController::class);
Route::apiResource('addteacher',AddTeacherController::class);
Route::apiResource('admission',AdmissionController::class);
Route::apiResource('assginment',AssginController::class);
Route::apiResource('exam',ExamController::class);



Route::post('studentlogin', [LoginStudentController::class, 'login']);
Route::post('studentlogout', [LoginStudentController::class, 'logout']);