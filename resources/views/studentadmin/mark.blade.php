@extends('layouts.studentlayout')

@section('title')
| Mark Details
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">

    <h3><b>Mark Details</b></h3>

    @if($marks->isEmpty())
        <div class="alert alert-info mt-3">
            Result  Not  published...
        </div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead style="background-color:beige">
                <tr>
                    <th>No</th>  
                    <th>Subject</th>       
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $index => $exam)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>English</td>
                    <td>{{ $exam->marks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
