@extends('layout.mainlayout')


@section('title')
    Teacher
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Student Details</b> </h1>       
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <h5><b>List Student</b></h5>
                <div id="test" style="margin-top:10px;"></div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>
                    function loadData()
                    {
                        const token = localStorage.getItem('api_token');
                        fetch('api/admission',
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
                                    <th>First Name</th>
                                    <th>Second Name</th>
                                    <th>Gender</th>
                                    <th>Image</th>
                                    <th>Birth Date</th>
                                    <th>Category</th>
                                    <th>GR Number</th>
                                    <th>Admission Date</th>
                                    <th>Father Name</th>
                                    <th>Father Mobile</th>
                                    <th>Father Image</th>
                                    <th>Delete</th>
                                    </tr>`;
                                    if(alldata){
                                            alldata.forEach(post => {
                                            tabledata += 
                                            `<tr>  
                                            <td><h6>${post.id}</h6></td>
                                            <td>${post.firstName}</td>
                                            <td>${post.secondName}</td>
                                            <td>${post.gender}</td>
                                            <td><img src ="/uploads/${post.image}" class="img"></td>
                                            <td>${post.birth}</td>
                                            <td>${post.category}</td>
                                            <td>${post.grNumber}</td>
                                            <td>${post.admissionDate}</td>
                                            <td>${post.fatherName}</td>
                                            <td>${post.fatherMobile}</td>
                                            <td><img src = "/uploads/${post.fatherImage}" class="img"></td>
                                            <td><button onclick="deletePost(${post.id})" style="background-color:Red;">Delete</button></td>
                                            </tr> `;
                                    });
                                    tabledata += `</table>`;
                                    sectionData.innerHTML = tabledata ;
                            }
                        });             
                    }

                    loadData(); 

                        async function deletePost(postId)
                        {
                       const token = localStorage.getItem('api_token');

                        let a = await fetch(`/api/admission/${postId}`,{                //send data into server 
                                method :'DELETE',
                                headers : {
                                        'Authorization' :`Bearer ${token}`,  
                                        'Content-type' : 'application/json'
                                }
                        }).then(response => response.json()).then(data => {console.log(data);window.location.href="/admission";});

                        }
                    </script>
                    </div>
                </body>
        </html>
@endsection