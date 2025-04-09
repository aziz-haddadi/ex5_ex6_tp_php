<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Add Student</h2>
        <form method='post' action='addStudent.php' enctype="multipart/form-data">
            <div class="mb-3">
                <label for="StudentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" name="StudentName" required>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" class="form-control" name="birthday" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <div class="mb-3">
                <label for="Section" class="form-label">Section</label>
                <input type="number" class="form-control" name="Section" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Student</button>
        </form>
        <div class="text-center mt-3">
            <a href="./studentList.php" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
</body>
