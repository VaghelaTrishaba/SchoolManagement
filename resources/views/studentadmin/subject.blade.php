@extends('layouts.studentlayout')

@section('title')
    | Student Subject
@endsection

@section('content')
<div style="background-color:rgb(242, 241, 240);width:70%;height:60%;margin-left:18%;margin-top:6%;">

    <h3><b style="margin-left:-5%;">Subject List</b></h3>

    <table class="table table-bordered table-striped" style="margin-top:4%;">
        <tr><th>Subject 1</th><td>{{ $subject->sub1 }}</td></tr>
        <tr><th>Subject 2</th><td>{{ $subject->sub2 }}</td></tr>
        <tr><th>Subject 3</th><td>{{ $subject->sub3 }}</td></tr>
        <tr><th>Subject 4</th><td>{{ $subject->sub4 }}</td></tr>
        <tr><th>Subject 5</th><td>{{ $subject->sub5 }}</td></tr>
        <tr><th>Subject 6</th><td>{{ $subject->sub6 }}</td></tr>
    </table>
</div>
@endsection
