<?php
include_once "Students.php";
include_once "Sections.php";
session_start();
if(isset($_GET['idSection'])){
    $students=Students::getStudentBySection($_GET['idSection']);
}
else if(isset($_GET['filter'])){
    $students=Students::getStudentsByNameFilter($_GET['filter']);
}else{
    $students=Students::getAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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
                        <a class="nav-link active" href="./studentList.php">Students List</a>
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
        <h2 class="text-center mb-4">Students List</h2>

        <!-- Export Buttons -->
        <div class="text-center mb-4">
            <?php 
            $parameters = "";
            if (isset($_GET['idSection'])) {
                $parameters = "?idSection=$_GET[idSection]";
            } else if (isset($_GET['filter'])) {
                $parameters = "?filter=$_GET[filter]";
            }
            ?>
            <a href="./extractStudentsExcel.php<?= $parameters ?>" class="btn btn-success me-2">Export to Excel</a>
            <a href="./extractStudentsCSV.php<?= $parameters ?>" class="btn btn-info me-2">Export to CSV</a>
            <a href="./extractStudentsPdf.php<?= $parameters ?>" class="btn btn-danger">Export to PDF</a>
            <?php if ($_SESSION["userRole"] == 'admin') { ?>
                <a href="addStudentForum.php" class="btn btn-primary ms-3"><i class="bi bi-plus-circle-fill"></i> Add Student</a>
            <?php } ?>
        </div>

        <!-- Students Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Section</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= $student['id']; ?></td>
                            <td><img src="./uploads/<?= $student['image']; ?>" class="img-thumbnail" style="width: 50px; height: 50px;"></td>
                            <td><?= $student['name']; ?></td>
                            <td><?= $student['birthday']; ?></td>
                            <td><?= Sections::getSection($student['section'])['designation']; ?></td>
                            <td class="text-center">
                                <a href="./detailStudent.php?id=<?= $student['id']; ?>" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-info-circle"></i> Details
                                </a>
                                <?php if ($_SESSION["userRole"] == 'admin') { ?>
                                    <a href="./deleteStudent.php?id=<?= $student['id']; ?>" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                    <a href="./updateStudentForm.php?id=<?= $student['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new DataTable(document.getElementById('table'), { pageLength: 5 });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>