@extends('layout.mainlayout')

@section('title')
     Parent
@endsection

@section('content')
        <h1 style="margin-left: -60%;font-size: 30px;"> <b>Parents Details</b></h1>
        <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                 <form>
                        <br><h5><b>List Parents</b></h5>
                </form>
                <center>
                        <div id="test"></div>
                </center>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <script>
                function loadData() {
                    const token = localStorage.getItem('api_token');

                    fetch('api/admission', {
                    method: 'GET',
                    headers: { 'Authorization': `Bearer ${token}` }
                    })
                    .then(res => res.json())
                    .then(data => {
                    const alldata = data.Messsage;
                    const sectionData = document.querySelector("#test");

                    let tabledata = `
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Student Name</th>
                            <th>Father Name</th>
                            <th>Father Mobile</th>
                            <th>Father Image</th>
                        </tr>`;

                    alldata.forEach(item => {
                        tabledata += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.firstName}</td>
                            <td>${item.fatherName}</td>
                            <td>${item.fatherMobile}</td>
                            <td><img src="/uploads/${item.fatherImage}" class="img"></td>
                        </tr>`;
                        
                    });
                    tabledata += `</table>`;
                    sectionData.innerHTML = tabledata;
                    });
                }
                loadData();
        </script>
    </div>
@endsection