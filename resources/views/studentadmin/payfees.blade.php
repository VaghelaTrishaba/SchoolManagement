@extends('layouts.studentlayout')

@section('title')
| Pay Fees
@endsection

@section('content')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">

            <h3 class="fw-bold mb-3">Pay Fees</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{ route('student.paystore') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Fee Name</label>
                                <input type="text" name="name" value="{{ $feeName }}" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Amount</label>
                                <input type="number" name="amount" value="{{ $amount }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Payment Mode</label>
                            <div class="d-flex gap-5 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mode" value="Cash" required>
                                    <label class="form-check-label">Cash</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mode" value="Online">
                                    <label class="form-check-label">Online</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success px-4">
                                Pay Offline 
                            </button>

                            <button type="submit" name="mode" value="Online" class="btn btn-primary px-4">
                                Pay Online
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
