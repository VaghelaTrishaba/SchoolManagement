@extends('layouts.studentlayout')

@section('title')
| Assignment Submit
@endsection

@section('content')
<div style="background-color:rgb(242, 241, 240);width:60%;height:60%;margin-left:25%;margin-top:70px;">

    <h3><b>Submit Assignment</b></h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" style="margin-top:7%;">
        @csrf
        <div class="mb-3">
            <label>Assignment Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload File</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
@endsection
