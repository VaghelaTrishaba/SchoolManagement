@extends('layouts.studentlayout')

@section('title' )
    | Notification
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">
    
    <h3><b>All Notifiactions</b></h3>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notification as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->title }}</td>
                <td>{{ $a->message }}</td>
                <td>{{ \Carbon\Carbon::parse($a->date)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
