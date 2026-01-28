<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | School Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <!-- Header -->
    <div class="top-header">
        <h1>School Management System</h1>
    </div>

    <!-- Login Form -->
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card login-card p-4">
                    <h3><b>Login</b></h3>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="mb-4">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter password">
                    </div>

                    <button id="loginButton" class="btn login-btn w-100">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <a href="#">School Management System</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>
        $(document).ready(function(){
            $("#loginButton").click(function(){

                const email = $("#email").val();
                const password = $("#password").val();

                $.ajax({
                    url: '/api/login',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        email: email,
                        password: password
                    }),
                    success: function(response){
                        localStorage.setItem('api_token', response.token);
                        window.location.href = "/home";
                    },
                });
            });
        });
        </script>

    </body>
</html>
