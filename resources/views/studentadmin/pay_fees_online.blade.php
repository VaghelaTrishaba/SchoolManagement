@extends('layouts.studentlayout')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-7 col-sm-10">

            <div class="card shadow border-0 rounded-4">
                <div class="card-body px-4 py-5">

                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-primary mb-1">
                            Confirm Online Payment
                        </h4>
                        <p class="text-muted small">
                            Please review the details before proceeding
                        </p>
                    </div>

                    <hr class="mb-4">

                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-semibold text-secondary">Student Name</span>
                        <span class="fw-semibold">{{ $fee->name }}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-semibold text-secondary">Payment Type</span>
                        <span class="badge bg-info px-3 py-2">
                            School Fees
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-semibold text-secondary">Total Amount</span>
                        <span class="fs-5 fw-bold text-success">
                            ₹{{ number_format($fee->amount, 2) }}
                        </span>
                    </div>

                    <form action="{{ route('fees.checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="fee_id" value="{{ $fee->id }}">

                        <button type="submit"
                            class="btn btn-success w-100 py-2 fw-semibold rounded-3">
                            Proceed to Secure Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
