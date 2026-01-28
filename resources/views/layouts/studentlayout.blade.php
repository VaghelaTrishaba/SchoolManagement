
    <title>Trishaba @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <header>
        <h1>Student Panel</h1>
    </header>
    <div class="container">
        <aside class="sidebar" style="margin-top:-8%;height:750px;">
            <a href="/home" style="text-decoration:none;color:black;"><h5><b>Dashboard</b></h5></a>
            <button class="dropdown-btn">
                Subjects
                <span  class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container" style="margin-top:-10%;">
                <a href="{{ route('student.subject') }}">Your Subject</a>
            </div>

             <button class="dropdown-btn" style="margin-top:-10%;">
                Assignment
                <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('student.assignment') }}">Submit Assignment</a>
                <a href="{{ route('student.myassignment') }}">My Assignments</a>
            </div>

            <button class="dropdown-btn" style="margin-top:-10%;">
                Notification
                <span class="arrow">&lt;</span>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('student.new') }}">New Assignment</a>
            </div>
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <a href="/home" style="margin-left:-6%;">School Management System</a>
        <button id="logoutBtn" class="btn btn-danger" style="margin-left:66%;margin-top:-1%;">
            Logout
        </button>
        <a href="/student/dashboard"><button class="btn btn-danger" style="margin-left:60%;margin-top:-3%;width:6.5%;">
            Back
        </button>
        </a>
    </footer>

<script>
document.querySelectorAll(".dropdown-btn").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
        e.preventDefault();

        let currentDropdown = this.nextElementSibling;

        document.querySelectorAll(".dropdown-container").forEach(function (dropdown) {
            if (dropdown !== currentDropdown) {
                dropdown.classList.remove("active");
            }
        });

        currentDropdown.classList.toggle("active");
    });
});
</script>


<script>
    document.getElementById('logoutBtn').addEventListener('click', function () {
        if (!confirm('Are you sure you want to logout?')) return;

        fetch('/api/studentlogout', {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            }
        })
        .then(res => res.json())
        .then(data => {
            window.location.href = "/loginStudent";
        });
    });
</script>


