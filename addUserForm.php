<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Add User</h2>
        <?php if (isset($_GET['errorMsg'])): ?>
            <div class="alert alert-danger"><?= $_GET['errorMsg'] ?></div>
        <?php endif; ?>
        <form method='post' action='addUser.php'>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="role" value="user" checked>
                    <label class="form-check-label">User</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="role" value="admin">
                    <label class="form-check-label">Admin</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password1" required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Retype Password</label>
                <input type="password" class="form-control" name="password2" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add User</button>
        </form>
        <div class="text-center mt-3">
            <a href="./index.php" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
</body>
