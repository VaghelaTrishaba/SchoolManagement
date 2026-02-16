@extends('layouts.studentlayout')

@section('title')
| Fees Details
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">

    <h3><b>Fees Details</b></h3>

    @if($fees->isEmpty())
        <div class="alert alert-info mt-3">
            Not  Avalible...
        </div>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead style="background-color:beige">
                <tr>
                    <th>No</th>  
                    <th>Fees Name</th>       
                    <th>Amount</th>
                    <th>Pay</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fees as $index => $fee)
                    @php
                        $isPaid = in_array($fee->name . '-' . $fee->amount, $paidFees);
                    @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $fee->name }}</td>
                    <td>{{ $fee->amount }}</td>
                    <td>
                        @if($isPaid)
                            <span class="btn btn-success btn-sm disabled">Payment Done</span>
                        @else
                            <a href="{{ route('student.pay', ['name' => $fee->name, 'amount' => $fee->amount]) }}" class="btn btn-primary btn-sm"> Pay </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection