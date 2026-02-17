
    <title>Trishaba @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="/home">Home</a>
            <a href="/about">About</a>
            <a href="/gallery">Gallery</a>
            <a href="/loginStudent">Student Login</a>
        </nav>
    </header>

    <div class="container">
        <aside class="sidebar" style=" height: 740px;">
            <a href="home" style="text-decoration:none;color:black;"><h5><b>Dashboard</b></h5></a>
            <button class="dropdown-btn">
                Academic
                <span class="arrow"><</span>
            </button>
            <div class="dropdown-container">
                <a href="medium">Medium</a>
                <a href="section">Section</a>
                <a href="stream">Stream</a>
                <a href="class">Class</a>
                <a href="assginclass">Assign Class Subject</a>
                <a href="assginclassTeacher">Assign Class Teacher</a>
                <a href="assginsubteacher">Assign Subject Teacher</a>
            </div>

            <button class="dropdown-btn" style="margin-top: -10%;">
                Teacher
                <span class="arrow"><</span>
            </button>
            <div class="dropdown-container">
                <a href="addteacher">Add New Teacher</a>
                <a href="details">Teacher Details</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Student
                <span class="arrow"><</span>
            </button>
            <div class="dropdown-container">
                <a href="admission">Student Admission</a>
                <a href="studdetails">Student Details</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Parents
                <span class="arrow"><</span>
            </button>
            <div class="dropdown-container">
                <a href="parents">Parents Details</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Assignment
                <span class="arrow"><</span>
            </button>
            <div class="dropdown-container">
                <a href="assginment">Aplode Assignment</a>
                <a href="allassginment">List  Of Assignment</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Exam
                <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="exam">Online Exam</a>
                <a href="question">Question</a>
                <a href="mark">Marks</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                    Fees
                    <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="fees">Manage Fees</a> 
                <a href="feesDetails">Fees Details</a>
                <a href="payment">Payment</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                    Notifiaction
                    <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="notification">Custom Notifiaction</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Attendance
                <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="attendance">Student Attendance</a>
                <a href="showattend">All Attendance</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Time Table
                <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="timetable">Time Table</a>
            </div> 
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <a href="/home">School Management System</a>
    </footer>

    <script>
       document.querySelectorAll(".dropdown-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {

            let currentDropdown = this.nextElementSibling;

            // Close all dropdowns first
            document.querySelectorAll(".dropdown-container").forEach(function (dropdown) {
                if (dropdown !== currentDropdown) {
                    dropdown.classList.remove("active");
                }
            });

            currentDropdown.classList.toggle("active");
        });
    });
    </script>
