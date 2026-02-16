@extends('layout.mainlayout')

@section('title')
    Attendance
@endsection

@section('content')

<h1 style="margin-left: 10%;font-size: 30px;"><b>Manage Attendance</b></h1>

<div style="background-color:rgb(242, 241, 240);width:60%;height:85%;margin-left:26%;margin-top:10px; padding:20px;">

    <h5><b>List Student</b></h5>

    <div id="test" style="margin-top:10px;"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
let students = [];

function loadData() {

    const token = localStorage.getItem('api_token');

    fetch('/api/admission', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {

        students = data.Messsage || [];

        const sectionData = document.querySelector("#test");

        let tabledata = `
        <form id="attendanceForm">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Attendance</th>
            </tr>
        `;

        students.forEach(student => {
            tabledata += `
            <tr>
                <td>${student.id}</td>
                <td>${student.firstName}</td>
                <td>
                    <label class="from-check">
                        <input class="form-check-input" type="radio" name="att_${student.id}" value="Present">
                        <span class="text-success fw-semibold">Present</span>
                    </label>
                    &nbsp;
                    <label class="from-check">
                        <input class="form-check-input" type="radio" name="att_${student.id}" value="Absent">
                        <span class="text-danger fw-semibold">Absent</span>
                    </label>
                </td>
            </tr>`;
        });

        tabledata += `
        </table>
        <button type="submit" class="btn btn-primary" style="margin-top:7%">Submit Attendance</button>
        </form>
        `;

        sectionData.innerHTML = tabledata;

        document.querySelector("#attendanceForm").onsubmit = async function(e) {
            e.preventDefault();

            for (const student of students) {

                const selected = document.querySelector(
                    `input[name="att_${student.id}"]:checked`
                );

                if (!selected) continue;

                const formData = new FormData();
                formData.append('roll', student.id);
                formData.append('name', student.firstName);
                formData.append('type', selected.value);

                const res = await fetch('/api/attendance', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await res.json();
                console.log(result);
            }

            alert("Attendance saved successfully");
            location.reload();
        };

    });
}

loadData();
</script>

@endsection
