@extends('layout.mainlayout')


@section('title')
    Teacher
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Assgin Class Teacher</b> </h1>       
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form>
                    <input type="text" id="search" placeholder="Search" style="margin-left:70%;height:10%;margin-top:10px;">
                </form>
                                <div id="test"></div>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                                <script>
                 
                                function loadData()
                                {
                                        const token = localStorage.getItem('api_token');
                                        Promise.all([
                                                fetch('api/class',
                                                {
                                                        method : 'GET',
                                                        headers : {'Authorization' : `Bearer ${token}`},
                                                }).then(response => response.json()),
                                                fetch('api/teacher',
                                                {
                                                        method : 'GET',
                                                        headers : {'Authorization' : `Bearer ${token}`},
                                                }).then(response => response.json())
                                        ]).then(([classRes,teacherRes]) => {
                                                                var alldata  = classRes.Messsage;
                                                                var alldata1 = teacherRes.Messsage;
                                                                console.log(classRes,teacherRes);
                                                                const sectionData = document.querySelector("#test");

                                                                var tabledata = `<br><table class="table table-bordered table-striped">         
                                                                <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Medium</th>
                                                                <th>Stream</th>
                                                                <th>Section</th>
                                                                <th>Teacher</th>
                                                                <th>Update</th>
                                                                </tr>`;
                                                                if(alldata && alldata1){
                                                                        alldata.forEach(post => {
                                                                        const sub = alldata1.find(s => s.class_id == post.id);
                                                                        tabledata += 
                                                                        `<tr>  
                                                                        <td><h6>${post.id}</h6></td>
                                                                        <td>${post.name}</td>
                                                                        <td>${post.medium}</td>
                                                                        <td>${post.stream}</td>
                                                                        <td>${post.section}</td>
                                                                        <td> ${sub ? `${sub.name}` : '-'}</td>
                                                                        <td><a href="/teacher">Update</a></td>
                                                                        </tr> `;
                                                                });

                                                                tabledata += `</table>`;
                                                                sectionData.innerHTML = tabledata ;
                                                        }
                                                });             
                                }
                                loadData();
                        </script>
                        </div>
                </body>
        </html>
@endsection