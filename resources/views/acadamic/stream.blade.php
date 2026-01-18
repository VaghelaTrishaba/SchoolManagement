@extends('layout.mainlayout')

@section('title')
     Stream
@endsection

@section('content')
        <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Streams</b></h1>
        
        <div style="background-color:rgb(242, 241, 240);width:50%;height:85%;">
                <form id="yes">
                        <h5 style="margin-left:-54%;"><br><b>Create Steam</b></h5><br>
                        <h5 style="margin-left:-69%;">Name:</h5><br>
                        <input type="text" placeholder="Name" id="name" style="margin-left:-30%;width:50%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                        <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);margin-left:-65%;width:80px;height:10%;border-radius:5px;">Submit</button>
                </form>
        </div>  
        <div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h1 class="modal-title fs-5" id="updateLabel">Stream</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateForm">
                                <div class="modal-body">
                                        <input type="hidden" id="postId" class="form-control" value=" ">
                                        <b>Name:</b><input type="text" id="postName" class="form-control" value=" ">
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="save changes" class="btn btn-primary" />
                                </div>
                        </form>
                 </div>
                </div>   
        </div>
        <div style="background-color:rgb(242, 241, 240);width:50%;height:85%;margin-left:60%;margin-top:-450px;">
                <form>
                        <br><h5><b>List Stream</b></h5>
                        <input type="text" id="search" placeholder="Search"> 
                </form>
                <center>
                        <div id="test"></div>
                </center>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <script>

                var addData = document.querySelector("#yes");  
                 addData.onsubmit = async (e) => {
                        e.preventDefault();

                        const token = localStorage.getItem('api_token');
                        const name = document.querySelector('#name').value;    

                        var formData = new FormData();          //form ma value add krava,make object of formData class
                        formData.append('name',name);             //add all value
                                let r = await fetch('api/streams',{                //send data into server 
                                        method :'POST',
                                        body : formData,  //for send data
                                        headers : {
                                               'Authorization' :`Bearer ${token}`, 
                                        }
                                }).then(response => response.json()).then(data => {window.location.href="/stream";});
                                }   

                function loadData()
                {
                         const token = localStorage.getItem('api_token');
                                fetch('api/streams',
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
                                                <th>Name</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                                </tr>`;
                                                if(alldata){
                                                        alldata.forEach(post => {
                                                        tabledata += 
                                                        `<tr>  
                                                        <td><h6> ${post.id}</h6></td>
                                                        <td>${post.name}</td>
                                                        <td><button type="button" onclick="openUpdateModal(${post.id} , '${post.name}')" data-bs-toggle="modal" data-bs-target="#updatemodal" style="background-color:lightGreen;">Update</button></td>
                                                        <td><button onclick="deletePost(${post.id})" style="background-color:Red;">Delete</button></td>
                                                        </tr> `;
                                                });

                                                tabledata += `</table>`;
                                                sectionData.innerHTML = tabledata ;
                                        }
                                });             
                }

                loadData();

                //open modal and get current data

                function openUpdateModal(id, name) {
                       document.getElementById("postId").value = id;
                       document.getElementById("postName").value = name;
                }

                //update data
                var updateform = document.querySelector("#updateForm");        //target form 
                updateform.onsubmit = async (e) => {
                        e.preventDefault(); //page refresh nai thay

                        const token = localStorage.getItem('api_token');

                        const id = document.querySelector("#postId").value;   
                        const name = document.querySelector("#postName").value;               //get value
                                                
                        var formData = new FormData();         //form ma value add krava,make object of formData class
                        formData.append('id',id);
                        formData.append('name',name);             //add all value

                        let a = await fetch(`/api/streams/${id}`,{                //send data into server 
                                method :'POST',
                                body : formData,  //for send data
                                headers : {
                                        'Authorization' :`Bearer ${token}`,
                                        'X-HTTP-Method-Override' : 'PUT'
                                        }
                                }).then(response => response.json()).then(data => {console.log(data);window.location.href="/stream";});
                }  

                //delete 
                async function deletePost(postId)
                {
                        const token = localStorage.getItem('api_token');

                        let a = await fetch(`/api/streams/${postId}`,{                //send data into server 
                                method :'DELETE',
                                headers : {
                                        'Authorization' :`Bearer ${token}`,  
                                        'Content-type' : 'application/json'
                                }
                        }).then(response => response.json()).then(data => {console.log(data);window.location.href="/stream";});

                }
        </script>
        </script>
        </div>

@endsection