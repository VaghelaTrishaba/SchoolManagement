@extends('layouts.studentlayout')

@section('title')
| Question Paper
@endsection

@section('content')
<div style="background-color:rgb(242,241,240); width:75%; margin-left:18%; margin-top:50px; padding:20px;">

    <h3><b>Paper</b></h3>

    @if($exams->isEmpty())
        <div class="alert alert-info mt-3">
            Not Uploaded..
        </div>
    @else

    <form method="POST" action="{{ url('/student/submit-answers') }}">
        @csrf

        <table class="table table-bordered table-striped mt-3">
            <thead style="background-color:beige">
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>Question</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exams as $index => $exam)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $exam->subject }}</td>
                    <td>{{ $exam->question }}</td>
                    <td>{{ $exam->option_a }}</td>
                    <td>{{ $exam->option_b }}</td>
                    <td>{{ $exam->option_c }}</td>
                    <td>{{ $exam->option_d }}</td>
                    <td>
                        <input type="text"
                               name="answers[{{ $exam->id }}]"
                               class="form-control"
                               placeholder="Answer"
                               required>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endif
</div>
@endsection
