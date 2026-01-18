<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
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
Route::get('/assginsubteacher',function(){return view('acadamic/assginsubjectTeacher');});

Route::controller(pageController::class)->group(
    function (){
        Route::get('/','showLogin');
        Route::get('/gellery','showGallery');
        Route::get('/about','showAbout');
        Route::get('/home','showHome');    
        Route::get('/assginclass','showAssginClass');
        Route::get('/assginclassTeacher','showAssginTeacher');
        Route::get('/assginsubjcetTeacher','showAssginsubTeacher');
        Route::get('/stream','showStream');
        Route::get('/class','showClass');
        Route::get('/medium','showMedium');
        Route::get('/section','showSection');
    }
);
