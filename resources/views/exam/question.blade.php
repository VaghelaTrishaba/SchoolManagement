@extends('layout.mainlayout')


@section('title')
    Online Exam
@endsection

@section('content')
<html>
    <body>
        <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Question</b> </h1>

        <div  style="background-color:rgb(242, 241, 240);width:50%;height:85%;margin-left:-3%;">
            <form id="yes">

                <select id="class_id" class="form-control">
                    <option value="">Select Class</option>
                </select>

                <input type="text" id="subject" class="form-control mt-2" placeholder="Subject">

                <textarea id="question" class="form-control mt-2" placeholder="Enter Question"></textarea>

                <input type="text" id="option_a" class="form-control mt-2" placeholder="Option A">
                <input type="text" id="option_b" class="form-control mt-2" placeholder="Option B">
                <input type="text" id="option_c" class="form-control mt-2" placeholder="Option C">
                <input type="text" id="option_d" class="form-control mt-2" placeholder="Option D">

                <select id="correct_option" class="form-control mt-2">
                    <option value="">Correct Answer</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>

                <button class="btn btn-primary mt-3">Submit</button>
            </form>    
        </div>

        <div style="background-color:rgb(242, 241, 240);width:60%;height:85%;margin-left:49%;margin-top:-450px;">
            <h4><b>Question  List</b></h4>
        <div id="test"></div>
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
                        const class_id = document.querySelector('#class_id').value;
                        const subject = document.querySelector('#subject').value;    
                        const question = document.querySelector('#question').value;
                        const option_a = document.querySelector('#option_a').value; 
                        const option_b = document.querySelector('#option_b').value; 
                        const option_c = document.querySelector('#option_c').value; 
                        const option_d = document.querySelector('#option_d').value;
                        const correct_option = document.querySelector('#correct_option').value;  

                        var formData = new FormData();         //form ma value add krava,make object of formData class
                        formData.append('class_id',class_id);
                        formData.append('subject',subject);
                        formData.append('question',question);             //add all value
                        formData.append('option_a',option_a);
                        formData.append('option_b',option_b);
                        formData.append('option_c',option_c);
                        formData.append('option_d',option_d);
                        formData.append('correct_option',correct_option);
                            let r = await fetch('api/question',{                //send data into server 
                                method :'POST',
                                headers : {'Authorization' :`Bearer ${token}` , 'Accept':`application/json` },
                                body : formData,  //for send data
                            }).then(response => response.json()).then(data => {window.location.href="/question";});
            } 

            function loadData() {
                const token = localStorage.getItem('api_token');

                fetch('api/question', {
                    method: 'GET',
                    headers: { 'Authorization': `Bearer ${token}` }
                })
                .then(response => response.json())
                .then(res => {
                    const exams = res.Message;
                    const sectionData = document.querySelector("#test");

                    let tabledata = `
                    <br>
                    <table class="table table-bordered table-striped" style="margin-top:-4%;">
                        <tr>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>question</th>
                            <th>option A</th>
                            <th>option B</th>
                            <th>option C</th>
                            <th>option D</th>
                            <th>Answer</th>
                        </tr>
                    `;

                    if (exams && exams.length > 0) {
                        exams.forEach(exam => {
                            tabledata += `
                            <tr>
                                <td>${exam.class.name} (${exam.class.section})</td>
                                <td>${exam.subject}</td>
                                <td>${exam.question}</td>
                                <td>${exam.option_a}</td>
                                <td>${exam.option_b}</td>
                                <td>${exam.option_c}</td>
                                <td>${exam.option_d}</td>
                                <td>${exam.correct_option}</td>
                            </tr>
                            `;
                        });
                    } else {
                        tabledata += `
                            <tr>
                                <td colspan="6" class="text-center">No exams found</td>
                            </tr>
                        `;
                    }

                    tabledata += `</table>`;
                    sectionData.innerHTML = tabledata;
                });
            }
            loadData();
        </script>
        </div>
    </body>
</html>
@endsection