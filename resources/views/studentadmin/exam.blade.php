@extends('layouts.studentlayout')

@section('title')
| Exam Details
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">

    <h3><b>Exam Details</b></h3>

    @if($exams->isEmpty())
        <div class="alert alert-info mt-3">
            No Exams Right Now..
        </div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead style="background-color:beige">
                <tr>
                    <th>No</th>         
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Duration</th>
                    <th>Exam Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $index => $exam)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $exam->subject }}</td>
                    <td>{{ $exam->marks }}</td>
                    <td>{{ $exam->duration }}</td>
                    <td>{{ \Carbon\Carbon::parse($exam->date)->format('d-m-Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
