@extends('layouts.studentlayout')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-7 col-sm-10">

            <div class="card shadow border-0 rounded-4">
                <div class="card-body text-center px-4 py-5">

                    <div class="mb-3">
                        <div class="rounded-circle bg-success text-white d-inline-flex
                                    align-items-center justify-content-center"
                             style="width:70px;height:70px;font-size:32px;">
                            ✓
                        </div>
                    </div>

                    <h4 class="fw-bold text-success mb-2">
                        Payment Successful
                    </h4>

                    <div class="alert alert-light border text-start mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold text-secondary">Payment Status</span>
                            <span class="badge bg-success">Paid</span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold text-secondary">Payment Mode</span>
                            <span>Online (Stripe)</span>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('student.fees') }}" class="btn btn-primary fw-semibold">
                            View Fees Details
                        </a>

                        <a href="{{ route('student.myfees')  }}" class="btn btn-outline-secondary">
                            Payed Fees
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
