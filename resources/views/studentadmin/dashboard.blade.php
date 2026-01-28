@extends('layouts.studentlayout')

@section('title')
    | Student
@endsection

@section('content')
<div style="background-color:rgb(242, 241, 240);width:75%;height:85%;margin-left:18%;margin-top:10px;">
    <h3><b style="margin-left:-5%">Welcome, {{ $student->firstName }}&nbsp;{{ $student->secondName }}</b><img src="/uploads/{{$student->image}}" width="15%" style="margin-left:30%;border:solid white 2px;border-radius:8px;margin-top:1%;"></h3>
    <table class="table table-bordered table-striped">
        <tr><th>ID</th><td>{{ $student->id }}</td></tr>
        <tr><th>GR Number</th><td>{{ $student->grNumber }}</td></tr>
        <tr><th>First Name</th><td>{{ $student->firstName }}</td></tr>
        <tr><th>Second Name</th><td>{{ $student->secondName }}</td></tr>
        <tr><th>Birth Date</th><td>{{ $student->birth }}</td></tr>
        <tr><th>Category</th><td>{{ $student->category }}</td></tr>
        <tr><th>Mobile</th><td>{{ $student->fatherMobile }}</td></tr>
        <tr><th>Admission Date</th><td>{{$student->admissionDate}}</td></tr>
    </table>
</div>
@endsection
