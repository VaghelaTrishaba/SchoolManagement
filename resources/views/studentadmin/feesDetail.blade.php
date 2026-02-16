@extends('layouts.studentlayout')

@section('title')
| Fees
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">

    <h3><b>Payed Fees</b></h3>

    @if($fees->isEmpty())
        <div class="alert alert-info mt-3">
            You have not pay fees.
        </div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead style="background-color:beige">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Submited Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fees as $index => $fee)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $fee->name }}</td>
                    <td>{{ $fee->amount }}</td>
                    <td>{{ $fee->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
