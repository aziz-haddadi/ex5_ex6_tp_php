
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php">Student Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./studentList.php">Students List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./sectionList.php">Sections List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">Welcome to the Administration Platform</h1>
            <p class="lead">Hello, PHP LOVERS! Manage your students and sections with ease.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>