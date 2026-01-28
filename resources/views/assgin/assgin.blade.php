@extends('layout.mainlayout')

@section('title')
     Assginment
@endsection

@section('content')
    <html>
        <style>
            input[type="text"]{
                width: 25%;
                height:35px;
            }
            input[type="date"]
            {
                width: 25%;
                height: 35px;
            }
        </style>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Assginment</b> </h1>
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                    <p style="margin-left:-3%;"><b>Apload Assginment</b></p>
                    <h4>Subject :</h4>
                    <input type="text" id="subject"></br></br>
                    <h4>File :</h4>
                    <input type="file" id="image" style="border-color:rgb(155, 155, 208);margin-left:8%"></br></br></br>
                    <h4>Submition Date :</h4>
                    <input type="date" id="date"></br></br>
                    <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);width:80px;height:10%;border-radius:5px;">Submit</button>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>          
                    var addData = document.querySelector("#yes");  
                    addData.onsubmit = async (e) => {
                            e.preventDefault();

                            const token = localStorage.getItem('api_token');
                            const subject = document.querySelector("#subject").value;
                            const image = document.querySelector("#image").files[0];
                            const date = document.querySelector("#date").value;

                            var formData = new FormData();          //form ma value add krava,make object of formData class
                            formData.append('subject',subject);
                            formData.append('file',image);
                            formData.append('date',date);
                                
                            let r = await fetch('api/assginment',{                //send data into server 
                                    method :'POST',
                                    body : formData,  //for send data
                                    headers : {
                                    'Authorization' :`Bearer ${token}`, 
                                    }
                            }).then(response => response.json()).then(data => {window.location.href="/assginment";});
                        }             
                </script>
            </div>
        </body>
    </html>
@endsection