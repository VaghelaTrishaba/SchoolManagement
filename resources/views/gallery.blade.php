@extends('layout.mainlayout')

@section('title')
    Gallery
@endsection

@section('content')
<div style="background-color: rgb(242,241,240); width: 90%; margin: 40px auto; padding: 30px; border-radius: 8px;margin-left:10%;">

    <h1 style="text-align: center; margin-bottom: 30px;">
        <b>Our Gallery</b>
    </h1>

    <p style="text-align: center; font-size: 16px; margin-bottom: 30px;">
        A glimpse of our campus life, events, and student activities
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">

        <div style="background: #fff; padding: 10px; border-radius: 6px;">
            <img src="classroom.jpg" style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px;">
            <p style="text-align:center; margin-top:8px;">Classroom Activity</p>
        </div>

        <div style="background: #fff; padding: 10px; border-radius: 6px;">
            <img src="annual.jpg" style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px;">
            <p style="text-align:center; margin-top:8px;">Annual Function</p>
        </div>

        <div style="background: #fff; padding: 10px; border-radius: 6px;">
            <img src="examhall.jpg" style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px;">
            <p style="text-align:center; margin-top:8px;">Exam Hall</p>
        </div>

    </div>

</div>
@endsection
