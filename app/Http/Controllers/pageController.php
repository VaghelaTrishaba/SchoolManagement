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

        public function showAddTeacher()
        {
            return view('teacher/addTeacher');
        }

        public function showTeacherDetails()
        {
            return view('teacher/teacherDetails');
        }

        public function showStudentAdmission()
        {
            return view('student/studentAdmission');
        }

        public function showStudentDetails()
        {
            return view('student/studentDetails');
        }

        public function showRolPermission()
        {
            return view('staffManagment/role&permission');
        }

        public function showStaff()
        {
            return view('staffManagment/staff');
        }

        public function showAssgin()
        {
            return view('assgin/assgin');
        }

        public function showAllAssgin(){
            return view('assgin/allassgin');
        }

        public function showExam()
        {
            return view('exam/onlineexam');
        }
    }
?>
