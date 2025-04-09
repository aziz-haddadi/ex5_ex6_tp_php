<?php
include_once "Students.php";
include_once "Sections.php";
session_start();
$student = Students::getStudent($_GET['id']);
$section = Sections::getSection($student['section']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        <a class="nav-link" href="./home.php">Home</a>
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
        <h2 class="text-center mb-4">Student Details</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $student['id'] ?></td>
                            <td><img src="./uploads/<?= $student['image']; ?>" class="img-thumbnail" style="width: 50px; height: 50px;"></td>
                            <td><?= $student['name'] ?></td>
                            <td><?= $student['birthday'] ?></td>
                            <td><?= $section['designation'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <a href="./studentList.php" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>