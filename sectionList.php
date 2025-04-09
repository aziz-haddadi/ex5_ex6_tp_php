<?php
include_once "Sections.php";
session_start();
$sections = Sections::getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sections List</title>
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
                        <a class="nav-link" href="./studentList.php">Students List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./sectionList.php">Sections List</a>
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
        <h2 class="text-center mb-4">Sections List</h2>

        <!-- Export Buttons -->
        <div class="text-center mb-4">
            <?php 
            $parameters = isset($_GET['filter']) ? "?filter=$_GET[filter]" : "";
            ?>
            <a href="./extractSectionsExcel.php<?= $parameters ?>" class="btn btn-success me-2">Export to Excel</a>
            <a href="./extractSectionsCSV.php<?= $parameters ?>" class="btn btn-info me-2">Export to CSV</a>
            <a href="./extractSectionsPdf.php<?= $parameters ?>" class="btn btn-danger">Export to PDF</a>
            <?php if ($_SESSION["userRole"] == 'admin') { ?>
                <a href="addSectionForum.php" class="btn btn-primary ms-3"><i class="bi bi-plus-circle-fill"></i> Add Section</a>
            <?php } ?>
        </div>

        <!-- Sections Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sections as $section): ?>
                        <tr>
                            <td><?= $section['id']; ?></td>
                            <td><?= $section['designation']; ?></td>
                            <td><?= $section['description']; ?></td>
                            <td class="text-center">
                                <a href="studentList.php?idSection=<?= $section['id']; ?>" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-card-list"></i> View Students
                                </a>
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