<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-dark text-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url('tasks') ?>">Task Manager</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= base_url('tasks') ?>">Welcome</a>
                <a class="nav-link" href="<?= base_url('tasks') ?>">Task List</a>
                <a class="nav-link" href="<?= base_url('profile') ?>">Profile</a>
                <a class="nav-link active" href="<?= base_url('about') ?>">About</a>
                <a class="btn btn-outline-light btn-sm ms-3 px-3" href="<?= base_url('login') ?>">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-lg">
                    <h3 class="fw-bold text-white mb-3">About the System</h3>
                    <p class="text-secondary mb-4">This Tasks for Today Management System is built using the CodeIgniter 4 framework.</p>

                    <ul class="list-group list-group-flush bg-transparent">
                        <li class="list-group-item bg-transparent text-light border-secondary d-flex justify-content-between align-items-center py-3">
                            <span class="text-secondary">Developer</span>
                            <span class="fw-semibold">Art Panulde</span>
                        </li>
                        <li class="list-group-item bg-transparent text-light border-secondary d-flex justify-content-between align-items-center py-3">
                            <span class="text-secondary">Framework</span>
                            <span class="fw-semibold">CodeIgniter 4</span>
                        </li>
                        <li class="list-group-item bg-transparent text-light border-secondary d-flex justify-content-between align-items-center py-3">
                            <span class="text-secondary">Architecture</span>
                            <span class="fw-semibold">MVC Pattern</span>
                        </li>
                        <li class="list-group-item bg-transparent text-light border-secondary d-flex justify-content-between align-items-center py-3">
                            <span class="text-secondary">Styling Framework</span>
                            <span class="fw-semibold">Bootstrap 5 / Dark Theme</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>