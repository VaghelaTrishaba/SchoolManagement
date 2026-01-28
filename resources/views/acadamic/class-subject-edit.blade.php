
@extends('layout.mainlayout')

@section('title')
     subject
@endsection

@section('content')
        <h1 style="margin-left: -60%;font-size: 30px;"> <b>Edit Class Subject</b></h1>
        <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                        <p style="margin-left:-60%;"><b>Core Subjects</b></p>
                        <select id="class_id" class="form-control" style="width:40%;"><option value="">Select a Class</option></select><br>
                        <input type="text" id="s1" class="form-control" value="Science" style="width:40%;"><br>
                        <input type="text" id="s2" class="form-control" value="Maths-Practical" style="width:40%;"><br>
                        <input type="text" id="s3" class="form-control" value="Account-theory" style="width:40%;"><br>
                        <input type="text" id="s4" class="form-control" value="English" style="width:40%;"><br>
                        <p style="margin-left:50%;margin-top:-25.90%;"><b>Elective Subjects</b></p>
                        <input type="text" id="s5" class="form-control" value="Drawing" style="width:40%;margin-left:52%;"><br>
                        <input type="text" id="s6" class="form-control" value="Music" style="width:40%;margin-left:52%;"><br>
                        <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);margin-left:-65%;width:80px;height:10%;border-radius:5px;margin-top:150px;">Submit</button>
                </form>
                <center>
                        <div id="test"></div>
                </center>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <script>

                function loadClasses() {
                        const token = localStorage.getItem('api_token');
                        fetch('api/class', {
                                method: 'GET',
                                headers: { 'Authorization': `Bearer ${token}` }
                        })
                        .then(response => response.json())
                        .then(data => {
                                const classes = data.Messsage; 
                                const selectElement = document.querySelector('#class_id');
                                

                                if (classes) {
                                classes.forEach(post => {
                                        let option = document.createElement('option');
                                        option.value = post.id;
                                        option.textContent = post.name + " (" + post.section + ")";
                                        selectElement.appendChild(option);
                                });
                                }
                        });
                        }
                        loadClasses();

                var addData = document.querySelector("#yes");  
                 addData.onsubmit = async (e) => {
                        e.preventDefault();

                        const token = localStorage.getItem('api_token');
                        const  class_id = document.querySelector('#class_id').value;
                        const sub1 = document.querySelector('#s1').value;    
                        const sub2 = document.querySelector('#s2').value;
                        const sub3 = document.querySelector('#s3').value;
                        const sub4 = document.querySelector('#s4').value;
                        const sub5 = document.querySelector('#s5').value;
                        const sub6 = document.querySelector('#s6').value;

                        var formData = new FormData();         //form ma value add krava,make object of formData class
                        formData.append('class_id',class_id);
                        formData.append('sub1',sub1);
                        formData.append('sub2',sub2);             //add all value
                        formData.append('sub3',sub3);
                        formData.append('sub4',sub4);
                        formData.append('sub5',sub5);
                        formData.append('sub6',sub6);
                                let r = await fetch('api/subject',{                //send data into server 
                                        method :'POST',
                                        body : formData,  //for send data
                                        headers : {'Authorization' :`Bearer ${token}` }
                                }).then(response => response.json()).then(data => {window.location.href="/assginclass";});
                }  
        </script>
@endsection