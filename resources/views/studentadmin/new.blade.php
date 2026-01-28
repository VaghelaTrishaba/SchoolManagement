@extends('layouts.studentlayout')

@section('title' )
    | Assignments
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">
    
    <h3><b>All Assignments</b></h3>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>File</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignments as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->subject }}</td>
                <td>
                    <a href="{{ asset('assign/'.$a->file) }}" target="_blank">
                        View File
                    </a>
                </td>
                <td>{{ \Carbon\Carbon::parse($a->date)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
