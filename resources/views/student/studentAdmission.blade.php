@extends('layout.mainlayout')


@section('title')
     Teacher
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
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Students</b> </h1>
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                    <p style="margin-left:-3%;"><b>Create Students</b></p>
                    <h5 style="margin-left:-85%;">First Name:</h5>
                    <input type="text" placeholder="First Name" id="fn" style="margin-left:-70%;margin-top:-0.5%;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-18%;margin-top:-8%;">Second Name:</h5>
                    <input type="text" placeholder="Second Name" id="sn" style="margin-left:-5%;margin-top:-0.5%;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:41%;margin-top:-8%;">Mobile:</h5>
                    <input type="number" placeholder="Moblie Number" id="mobile" style="margin-left:60%;margin-top:-0.5%;width:25%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-87%;margin-top:-8;">Gender :</h5>
                    <h5 style="margin-left:-77%;">Male <input type="radio" name="gender" id="male" value="male" style="margin-top:-0.5%"> &nbsp; Female <input type="radio" name="gender" id="female" value="female" style="margin-top:-0.5%"></h5>
                    <h5 style="margin-left:-24%;margin-top:-6%;">Image :</h5>
                    <input type="file" id="image" style="margin-left:-2%;margin-top:-0.3%;border-color:rgb(155, 155, 208)"></br></br>
                    <h5 style="margin-left:43%;margin-top:-7%;">Birth Date</h5>
                    <input type="date" id="birth" style="margin-left:60%;margin-top:-0.5%;border-color:rgb(155, 155, 208)"></br></br>
                    <h5 style="margin-left:-87%;margin-top:-1.5%;">Category:</h5>
                    <input type="text" placeholder="Category" id="cat" style="margin-left:-70%;margin-top:-0.5%;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-20%;margin-top:-7.9%;">GR Number:</h5>
                    <input type="number" placeholder="Category" id="grNumber" style="margin-left:-5%;width:25%;height:35px;margin-top:-0.5%;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:48%;margin-top:-7%;">Admission Date</h5>
                    <input type="date" id="addate" style="margin-left:60%;margin-top:-0.5%;border-color:rgb(155, 155, 208)"></br></br>
                    <h5 style="margin-left:-83%;margin-top:-1%;">Father Name:</h5>
                    <input type="text" placeholder="Father Name" id="fatherName" style="margin-left:-70%;margin-top:-0.5%;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-18%;margin-top:-8%;">Father Mobile:</h5>
                    <input type="number" placeholder="Father Mobile" id="fatherMobile" style="margin-left:-5%;margin-top:-0.5%;width:25%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:48%;margin-top:-7.5%;">Father Image :</h5>
                    <input type="file" id="fatherImage" style="margin-left:65%;margin-top:-0.3%;border-color:rgb(155, 155, 208)"></br></br>
                    <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);margin-left:-8%;width:80px;height:10%;border-radius:5px;">Submit</button>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>          
                    var addData = document.querySelector("#yes");  
                    addData.onsubmit = async (e) => {
                            e.preventDefault();

                            const token = localStorage.getItem('api_token');
                            const firstName = document.querySelector("#fn").value;  
                            const secondName = document.querySelector("#sn").value; 
                            const mobile = document.querySelector("#mobile").value; 
                            const gender = document.querySelector('input[name="gender"]:checked')?.value;
                            const image = document.querySelector("#image").files[0];
                            const birth = document.querySelector("#birth").value;
                            const cat = document.querySelector("#cat").value;
                            const grNumber = document.querySelector("#grNumber").value;  
                            const addate = document.querySelector("#addate").value; 
                            const fatherName = document.querySelector("#fatherName").value;  
                            const fatherMobile = document.querySelector("#fatherMobile").value;  
                            const fatherImage = document.querySelector("#fatherImage").files[0];

                            var formData = new FormData();          //form ma value add krava,make object of formData class
                            formData.append('firstName',firstName);  //add all value
                            formData.append('secondName',secondName);
                            formData.append('mobile',mobile);
                            formData.append('gender',gender);
                            formData.append('image',image);
                            formData.append('birth',birth);
                            formData.append('category',cat);
                            formData.append('grNumber',grNumber);
                            formData.append('admissionDate',addate);
                            formData.append('fatherName',fatherName);
                            formData.append('fatherMobile',fatherMobile);
                            formData.append('fatherImage',fatherImage);
                                
                            let r = await fetch('api/admission',{                //send data into server 
                                    method :'POST',
                                    body : formData,  //for send data
                                    headers : {
                                    'Authorization' :`Bearer ${token}`, 
                                    }
                            }).then(response => response.json()).then(data => {window.location.href="/admission";});
                        }             
                </script>
            </div>
        </body>
    </html>
@endsection