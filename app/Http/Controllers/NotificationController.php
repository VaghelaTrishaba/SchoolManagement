<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;

class NotificationController extends Controller
{
     public function notification()
    {
        $name = session('student_name');

        if (!$name) {
            return 'Session expired. Please login again.';
        }

        $notification = Notification::all();

        return view('studentadmin.notification', compact('notification'));
    }
}

