@extends('layout.mainlayout')


@section('title')
    Assignments
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>All Assignments</b> </h1>       
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <h5><b>List Assginment</b></h5>
                <div id="test" style="margin-top:10px;"></div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>
                    function loadData()
                    {
                        const token = localStorage.getItem('api_token');
                        fetch('api/assginment',
                        {
                            method : 'GET',
                            headers : {'Authorization' : `Bearer ${token}`},
                            }).then(response => response.json())
                            .then(data => {
                                    var alldata  = data.Messsage;
                                    console.log(data);
                                    const sectionData = document.querySelector("#test");

                                    var tabledata = `<br><table class="table table-bordered table-striped">         
                                    <tr>
                                    <th>Id</th>
                                    <th>Subject</th>
                                    <th>Assgimnent</th>
                                    <th>Submition Date</th>
                                    </tr>`;
                                    if(alldata){
                                            alldata.forEach(post => {
                                            tabledata += 
                                            `<tr>  
                                            <td><h6>${post.id}</h6></td>
                                            <td>${post.subject}</td>
                                            <td><a href="/assign/${post.file}" target="_blank" class="btn btn-sm btn-success">View Assignment</a></td>
                                            <td>${post.date.split('-').reverse().join('-')}</td>
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