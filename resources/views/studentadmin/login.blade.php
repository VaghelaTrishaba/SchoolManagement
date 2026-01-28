<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trishaba | Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            background-color: #ededed;
            font-family: Arial, sans-serif;
        }

        /* Top Header */
        .top-header {
            background-color: #a7a9a6;
            padding: 20px 0;
            text-align: center;
        }

        .top-header h1 {
            margin: 0;
            font-size: 36px;
            color: #000;
        }

        /* Login Card */
        .login-container {
            margin-top: 80px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        .login-card h3 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            height: 45px;
        }

        .login-btn {
            background-color: #c9c9c9;
            border: none;
            font-weight: bold;
            height: 45px;
        }

        .login-btn:hover {
            background-color: #b5b5b5;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #a7a9a6;
            text-align: center;
            padding: 10px;
        }

        .footer a {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>

    <body>

    <div class="top-header">
        <h1>Student  Admin Login</h1>
    </div>

    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card login-card p-4">
                    <h3><b>Login</b></h3>
                    <div id="errorBox" class="alert alert-danger d-none" role="alert"></div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter Name">
                    </div>

                    <div class="mb-4">
                        <label>GR Number</label>
                        <input type="number" id="grNumber" class="form-control" placeholder="Enter GR Number">
                    </div>

                    <button id="loginButton" class="btn login-btn w-100">
                        Login
                    </button>
        
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <a href="/home">School Management System</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $(document).ready(function(){
            $("#loginButton").click(function(){

                const firstName = $("#name").val();
                const grNumber = $("#grNumber").val();

                $.ajax({
                    url: '/studentlogin',
                    type: 'POST',
                    data: {
                        firstName: firstName,
                        grNumber: grNumber
                    },
                    success: function (response) {
                    $("#errorBox").removeClass("d-none").text("Login Done!!");    
                    window.location.href = "/student/dashboard";
                },
                error : function(mes)
                {
                    if(mes.status == 401)
                    {
                        $("#errorBox").removeClass("d-none").text("Name or GR Number Wrong!");
                    }
                }
                });
            });
        });
        </script>

    </body>
</html>
