@extends('layout.mainlayout')


@section('title')
     | Fees
@endsection

@section('content')
    <html>
        <body>
            <h1 style="margin-left: -60%;font-size: 30px;"> <b>Manage Fees</b> </h1>
            <div style="background-color:rgb(242, 241, 240);width:100%;height:85%;margin-left:5%;margin-top:10px;">
                <form id="yes">
                    <p style="margin-left:-3%;"><b>Manage Fees</b></p>
                    <select id="class_id" class="form-control" style="width:50%;margin-left:25%;height:10%;"><option value="">Class Section</option></select><br>
                    <h5>Fees Name:</h5>
                    <input id="name" type="text" class="form-control" style="width:50%;margin-left:25%;height:10%;"><br>
                    <h5>Amount:</h5>
                    <input id="amount" type="number" class="form-control" style="width:50%;margin-left:25%;height:10%;"><br>
                    
                    <h5 style="margin-left:4%;margin-top:-8;">Select :  Compulsory <input type="radio" name="status" id="compulsory" value="compulsory" style="margin-top:-0.5%"> &nbsp;  Optional <input type="radio" name="status" id="optional" value="optional" style="margin-top:-0.5%"></h5>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>

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
                            const class_id = document.querySelector("#class_id").value;  
                            const name = document.querySelector("#name").value; 
                            const amount = document.querySelector("#amount").value; 
                            const status = document.querySelector('input[name="status"]:checked')?.value;

                            var formData = new FormData(); 
                            formData.append('class_id',class_id);
                            formData.append('name',name);
                            formData.append('amount',amount);
                            formData.append('status',status);
                                
                            let r = await fetch('api/fees',{              
                                    method :'POST',
                                    body : formData,  //for send data
                                    headers : {
                                    'Authorization' :`Bearer ${token}`, 
                                    }
                            }).then(response => response.json()).then(data => {window.location.href="/fees";});
                        }             
                </script>
            </div>
        </body>
    </html>
@endsection