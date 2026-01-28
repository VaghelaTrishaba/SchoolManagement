@extends('layouts.studentlayout')

@section('title')
| My Assignments
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">

    <h3><b>My Assignments</b></h3>

    @if($assignments->isEmpty())
        <div class="alert alert-info mt-3">
            You have not submitted any assignments yet.
        </div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead style="background-color:beige">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Submitted Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $index => $assignment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $assignment->title }}</td>
                    <td>
                        <a href="{{ asset('assignments/'.$assignment->file) }}" target="_blank">
                            View / Download
                        </a>
                    </td>
                    <td>{{ $assignment->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
