
    <title>Trishaba @yield('title')</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <header>
        <h1>School Management System</h1>
        <nav>
            <a href="/home">Home</a>
            <a href="/about">About</a>
            <a href="/gallery">Gallery</a>
            <a href="/contactus">Contact Us</a>
        </nav>
    </header>

    <div class="container">
        <aside class="sidebar">
            <a href="home" style="text-decoration:none;color:black;"><h5><b>Dashboard</b></h5></a>
            <button class="dropdown-btn">
                Academic
                <span class="arrow">▼</span>
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
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <a href="/home">School Management System</a>
    </footer>

    <script>
        document.querySelector(".dropdown-btn").addEventListener("click", function () {
            let dropdown = this.nextElementSibling;
            dropdown.style.display =
                dropdown.style.display === "block" ? "none" : "block";
        });
    </script>
