<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;

    class pageController extends Controller
    {
        public function showLogin()
        {
            return  view("welcome");
        }
        public function showAbout()
        {
            return view('about');
        }

        public function showHome()
        {
            return view('home');
        }

        public function showGallery()
        {
            return view('gallery');
        }

        public function showMedium()
        {
            return view('acadamic/medium');
        }

        public function showSection()
        {
            return view('acadamic/section');
        }
       
        public function showStream()
        {
            return view('acadamic/stream');
        }

        public function showClass()
        {
            return view('acadamic/class');
        }
        public function showAssginClass()
        {
            return view('acadamic/assginclass');
        }

        public function showAssginTeacher()
        {
            return view('acadamic/assginclassTeacher');
        }
        public function showAssginsubTeacher()
        {
            return view('acadamic/assginsubjectTeacher');
        }

        public function showSubject()
        {
            return view('acadamic/subject');
        }

    }
?>
