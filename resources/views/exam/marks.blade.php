@extends('layout.mainlayout')

@section('content')
<h3 style="margin-left:10%;">Total Marks</h3>

<div style="background-color:rgb(242, 241, 240);width:80%;height:80%;margin-left:17%;margin-top:10px;">
    <br><table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Class ID</th>
                <th>Total Marks</th>
            </tr>
        </thead>
        <tbody id="marksBody">
            <tr>
                <td colspan="3">Loading...</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function loadData() {
        const token = localStorage.getItem('api_token');

        fetch('api/mark', {
            method: 'GET',
            headers: { 'Authorization': `Bearer ${token}` }
        })
        .then(response => response.json())
        .then(result => {
        let tbody = document.getElementById('marksBody');
        tbody.innerHTML = '';
            console.log(result);
        if (!result.data || result.data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="3" class="text-center">No data found</td>
                </tr>`;
            return;
        }
        result.data.forEach(row => {
            tbody.innerHTML += `
                <tr>
                    <td>${row.student_id}</td>
                    <td>${row.class_id}</td>
                    <td>${row.marks}</td>
                </tr>
            `;
        });
    })
    }
    loadData();
</script>
@endsection