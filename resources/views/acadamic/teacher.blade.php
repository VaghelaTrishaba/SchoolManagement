
@extends('layout.mainlayout')

@section('title')
     Teacher
@endsection

@section('content')
        <h1 style="margin-left: -60%;font-size: 30px;"> <b>Class Teacher</b></h1>
        <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                        <p style="margin-left:-60%;"><b>Assgin Teacher</b></p>
                        <select id="class_id" class="form-control" style="width:40%;"><option value="">Select a Class</option></select><br>
                        <input type="text" id="name" class="form-control" style="width:40%;" placeholder="Name"><br>
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
                        const name = document.querySelector('#name').value;    
                
                        var formData = new FormData();        
                        formData.append('class_id',class_id);
                        formData.append('name',name);
                                let r = await fetch('api/teacher',{               
                                        method :'POST',
                                        body : formData,
                                        headers : {'Authorization' :`Bearer ${token}` }
                                }).then(response => response.json()).then(data => {window.location.href="/assginclassTeacher";});
                }  
        </script>
@endsection