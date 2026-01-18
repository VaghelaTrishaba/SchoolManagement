
@extends('layout.mainlayout')

@section('title')
     subject
@endsection

@section('content')
        <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Subject Teacher</b></h1>
        <div style="background-color:rgb(242, 241, 240);width:50%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                        <p style="margin-left:-3%;"><b>Assgin Subject Teacher</b></p>
                        <select id="class_id" class="form-control" style="width:50%;margin-left:25%;height:10%;"><option value="">Class Section</option></select><br>
                        <select id="teacher_id" class="form-control" style="width:50%;margin-left:25%;height:10%;"><option value="">Teacher</option></select><br>
                        <select id="subject_id" class="form-control" style="width:50%;margin-left:25%;height:10%;"><option value="hindi">Subject</option></select><br>
                        <button style="background-color: rgb(5, 72, 113);color:rgb(252, 247, 247);margin-left:-8%;width:80px;height:10%;border-radius:5px;margin-top:50px;">Submit</button>
                </form>
        </div>
        <div style="background-color:rgb(242, 241, 240);width:50%;height:85%;margin-left:60%;margin-top:-450px;">
                 <form>
                        <br><h5><b>List Subject Teacher</b></h5>
                </form>
                <center>
                        <div id="test"></div>
                </center>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <script>
                function loadData() {
                    const token = localStorage.getItem('api_token');

                    fetch('api/subteacher', {
                    method: 'GET',
                    headers: { 'Authorization': `Bearer ${token}` }
                    })
                    .then(res => res.json())
                    .then(data => {
                    const alldata = data.Messsage;
                    const sectionData = document.querySelector("#test");

                    let tabledata = `
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Class</th>
                            <th>Medium</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                        </tr>`;

                    alldata.forEach(item => {
                        tabledata += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.class.name} ${item.class.section}</td>
                            <td>${item.class.medium}</td>
                            <td>${item.subject.sub1}</td>
                            <td>${item.teacher.name}</td>
                        </tr>`;
                    });

                    tabledata += `</table>`;
                    sectionData.innerHTML = tabledata;
                    });
                }
                loadData();

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
                                        option.textContent = post.name  +  post.section + "(" + post.medium + ")";
                                        selectElement.appendChild(option);
                                });
                                }
                        });
                        }
                        loadClasses();

                function loadTeacher(){
                    const token = localStorage.getItem('api_token');
                    fetch('api/teacher',{
                        method : 'GET',
                        headers: { 'Authorization': `Bearer ${token}` }
                    })
                    .then(response=>response.json())
                    .then(data =>{
                            const teacher = data.Messsage;
                            const selectElement = document.querySelector("#teacher_id");
                            
                            if(teacher){
                                teacher.forEach(post=>{
                                    let option = document.createElement('option');
                                    option.value = post.id;
                                    option.textContent = post.name;
                                    selectElement.appendChild(option);
                                })
                            }
                    });
                }
                loadTeacher();

                function loadSubject()
                {
                    const token = localStorage.getItem('api_token');
                    fetch('api/subject',{
                        method : 'GET',
                        headers : { 'Authorization': `Bearer ${token}` }
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        const subject = data.Messsage;
                        const selectElement = document.querySelector("#subject_id");

                        if(subject){
                            subject.forEach(post=>{
                                let option = document.createElement('option');
                                option.value = post.id;
                                option.textContent = post.sub1;
                                selectElement.appendChild(option);
                            })
                        }
                    });
                }
                loadSubject();

                var addData = document.querySelector("#yes");  
                 addData.onsubmit = async (e) => {
                        e.preventDefault();

                        const token = localStorage.getItem('api_token');
                        const  class_id = document.querySelector('#class_id').value;
                        const  teacher_id = document.querySelector('#teacher_id').value;
                        const  subject_id = document.querySelector('#subject_id').value;

                        var formData = new FormData();         //form ma value add krava,make object of formData class
                        formData.append('class_id',class_id);
                        formData.append('teacher_id',teacher_id);
                        formData.append('subject_id',subject_id);             //add all value
                                let r = await fetch('api/subteacher',{                //send data into server 
                                        method :'POST',
                                        body : formData,  //for send data
                                        headers : {'Authorization' :`Bearer ${token}` }
                                }).then(response => response.json()).then(data => {window.location.href="/assginsubteacher";});
                } 
        </script>
    </div>
@endsection