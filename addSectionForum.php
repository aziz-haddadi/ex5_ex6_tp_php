<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Add Section</h2>
        <form method='post' action='addSection.php'>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Section</button>
        </form>
        <div class="text-center mt-3">
            <a href="./sectionList.php" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
</body>
