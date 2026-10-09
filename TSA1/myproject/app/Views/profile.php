<?php /** @var array $user */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-dark text-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="<?= base_url('/tasks') ?>">Task Manager</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/tasks') ?>">Task List</a></li>
                    <li class="nav-item"><a class="nav-link active text-info" href="<?= base_url('/profile') ?>">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About</a></li>
                    <li class="nav-item ms-3">
                        <span class="text-light small me-2">Hello, <?= esc(session()->get('full_name')) ?></span>
                        <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger btn-sm">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Profile Header Card -->
                <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-lg text-center mb-4">
                    <div class="avatar-circle mx-auto mb-3 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fs-2 fw-bold" style="width: 80px; height: 80px;">
                        <?= strtoupper(substr($user['full_name'], 0, 1)) ?>
                    </div>
                    <h3 class="text-white fw-bold mb-0"><?= esc($user['full_name']) ?></h3>
                    <p class="text-secondary mb-0">@<?= esc($user['username']) ?></p>
                </div>

                <!-- Profile Details Card -->
                <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-lg">
                    <div class="mb-3 border-bottom border-secondary pb-3">
                        <span class="text-secondary small d-block"><i class="fa-solid fa-id-badge me-2"></i>User ID</span>
                        <div class="text-white fw-semibold">#<?= esc($user['id']) ?></div>
                    </div>
                    <div class="mb-3 border-bottom border-secondary pb-3">
                        <span class="text-secondary small d-block"><i class="fa-solid fa-envelope me-2"></i>Email Address</span>
                        <div class="text-white fw-semibold"><?= esc($user['email']) ?></div>
                    </div>
                    <div>
                        <span class="text-secondary small d-block"><i class="fa-solid fa-calendar-days me-2"></i>Account Created</span>
                        <div class="text-white fw-semibold"><?= esc($user['created_at']) ?></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>