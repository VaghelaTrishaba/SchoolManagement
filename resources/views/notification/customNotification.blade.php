@extends('layout.mainlayout')


@section('title')
    | Notification 
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Notification</b> </h1>

            <div style="background-color:rgb(242, 241, 240);width:50%;height:85%;">
                <form id="yes">
                    <h5 style="margin-left:-54%;"><br><b>Send Notication</b></h5><br>
                    <h5 style="margin-left:-69%;">Title:</h5>
                    <input type="text" placeholder="Name" id="title" style="margin-left:-30%;width:50%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-65%;">Message:</h5>
                    <input type="text" placeholder="Medium" id="message" style="margin-left:-30%;width:50%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-69%;">Date:</h5>
                    <input type="date" placeholder="Stream" id="Date" style="margin-left:-30%;width:50%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);margin-left:-5%;width:80px;height:10%;border-radius:5px;">Submit</button>
                </form>
            </div>   
            <div style="background-color:rgb(242, 241, 240);width:60%;height:85%;margin-left:53%;margin-top:-450px;">
                <form>
                    <br><h5><b>List Of Custom Notications</b></h5>
                </form>
                <div id="test"></div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>
                    
                    var addData = document.querySelector("#yes");  
                    addData.onsubmit = async (e) => {
                            e.preventDefault();

                            const token = localStorage.getItem('api_token');

                            const title = document.querySelector("#title").value;   
                            const message = document.querySelector("#message").value;
                            const date = document.querySelector("#date").value; 

                            var formData = new FormData();          
                            formData.append('title',title);   
                            formData.append('message',message);
                            formData.append('date',date);
                    
                            let r = await fetch('api/notification',{              
                                    method :'POST',
                                    body : formData, 
                                    headers : {
                                    'Authorization' :`Bearer ${token}`, 
                                    }
                            }).then(response => response.json()).then(data => {window.location.href="/notification";});
                    }   

                        
                function loadData()
                {
                const token = localStorage.getItem('api_token');
                fetch('api/notification',
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
                            <th>Title</th>
                            <th>Message</th>
                            <th>Date</th>
                            </tr>`;
                            if(alldata){
                                    alldata.forEach(post => {
                                    tabledata += 
                                    `<tr>  
                                    <td><h6>${post.id}</h6></td>
                                    <td>${post.title}</td>
                                    <td>${post.message}</td>
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