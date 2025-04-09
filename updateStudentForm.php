<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Update Student</h2>
        <form method='post' action='updateStudent.php?id=<?= $_GET['id']?>' enctype="multipart/form-data">
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="imageCheckBox" value="1">
                <label class="form-check-label">Update Image</label>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">New Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="sectionCheckBox" value="1">
                <label class="form-check-label">Update Section</label>
            </div>
            <div class="mb-3">
                <label for="section" class="form-label">New Section</label>
                <input type="number" class="form-control" name="section">
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
        <div class="text-center mt-3">
            <a href="./studentList.php" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
</body>