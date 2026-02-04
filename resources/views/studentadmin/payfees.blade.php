@extends('layouts.studentlayout')

@section('title')
| Pay Fees
@endsection

@section('content')
<div style="background-color:rgb(242, 241, 240);width:64%;height:74%;margin-left:25%;margin-top:70px;">

    <h3><b>Pay Fees</b></h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('student.paystore') }}" method="POST" style="margin-top:6%;">
        @csrf

        <div class="mb-3">
            <label>Student Name :</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Amount :</label>
            <input type="text" name="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mode :</label><br>
            <input type="radio" name="mode" value="Cash" required> Cash
            <input type="radio" name="mode" value="Online"> Online
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
