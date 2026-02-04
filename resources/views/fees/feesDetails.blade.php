@extends('layout.mainlayout')


@section('title')
    Fees
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Fees Details</b> </h1>       
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <h5><b>List Fees</b></h5>
                <div id="test" style="margin-top:10px;"></div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>
                    function loadData()
                    {
                        const token = localStorage.getItem('api_token');
                        fetch('api/fees',
                        {
                            method : 'GET',
                            headers : {'Authorization' : `Bearer ${token}`},
                            }).then(response => response.json())
                            .then(data => {
                                    var alldata  = data.Message;
                                    console.log(data);
                                    const sectionData = document.querySelector("#test");

                                    var tabledata = `<br><table class="table table-bordered table-striped">         
                                    <tr>
                                    <th>Id</th>
                                    <th>Class</th>
                                    <th>Fees Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    </tr>`;
                                    if(alldata){
                                            alldata.forEach(post => {
                                            tabledata += 
                                            `<tr>  
                                            <td><h6>${post.id}</h6></td>
                                            <td>${post.class.name} (${post.class.section})</td>
                                            <td>${post.name}</td>
                                            <td>${post.amount}</td>
                                            <td>${post.status}</td>
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