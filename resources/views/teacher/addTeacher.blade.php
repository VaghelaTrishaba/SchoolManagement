@extends('layout.mainlayout')


@section('title')
     Teacher
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Teacher</b> </h1>
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                    <p style="margin-left:-3%;"><b>Create Teacher</b></p>
                    <h5 style="margin-left:-85%;">First Name:</h5>
                    <input type="text" placeholder="First Name" id="fn" style="margin-left:-60%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:22.5%;margin-top:-8%;">Second Name:</h5>
                    <input type="text" placeholder="Second Name" id="sn" style="margin-left:45%;margin-top:-0.5%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:17%;margin-top:1%;">Gender :</h5>
                    <h5 style="margin-left:26%;">Male <input type="radio" name="gender" id="male" value="male"> &nbsp; Female <input type="radio" name="gender" id="female" value="female"></h5>
                    <h5 style="margin-left:-90%;margin-top:-6%;">Email:</h5>
                    <input type="text" placeholder="Email" id="email" style="margin-left:-60%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:16%;margin-top:4;">Mobile:</h5>
                    <input type="number" placeholder="Moblie Number" id="mobile" style="margin-left:45%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-89%;margin-top:-90;">Image:</h5>
                    <input type="file" id="img" style="margin-left:-60%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:-84%;margin-top:4;">Date of birth:</h5>
                    <input type="date" placeholder="Birth Date" id="birth" style="margin-left:-60%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <h5 style="margin-left:21%;margin-top:-7.9%;">Qualifiaction:</h5>
                    <input type="text" id="quali" style="margin-left:45%;width:35%;height:35px;border-color:rgb(155, 155, 208)"><br><br>
                    <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);margin-left:-8%;margin-top:-3.5%;width:80px;height:10%;border-radius:5px;">Submit</button>
                </form>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <script>          
                    var addData = document.querySelector("#yes");  
                    addData.onsubmit = async (e) => {
                            e.preventDefault();

                            const token = localStorage.getItem('api_token');
                            const firstName = document.querySelector("#fn").value;  
                            const secondName = document.querySelector("#sn").value; 
                            const gender = document.querySelector('input[name="gender"]:checked')?.value;
                            const email = document.querySelector("#email").value;  
                            const mobile = document.querySelector("#mobile").value; 
                            const image = document.querySelector("#img").files[0];
                            const birth = document.querySelector("#birth").value;
                            const quali = document.querySelector("#quali").value;       

                            var formData = new FormData();          //form ma value add krava,make object of formData class
                            formData.append('firstName',firstName);  //add all value
                            formData.append('secondName',secondName);
                            formData.append('gender',gender);
                            formData.append('email',email);
                            formData.append('mobile',mobile);
                            formData.append('image',image);
                            formData.append('birth',birth);
                            formData.append('qualification',quali);
                                
                            let r = await fetch('api/addteacher',{                //send data into server 
                                    method :'POST',
                                    body : formData,  //for send data
                                    headers : {
                                    'Authorization' :`Bearer ${token}`, 
                                    }
                            }).then(response => response.json()).then(data => {window.location.href="/addteacher";});
                        }             
                </script>
            </div>
        </body>
    </html>
@endsection