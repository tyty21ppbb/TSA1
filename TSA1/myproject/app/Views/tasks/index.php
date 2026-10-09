<?php /** @var array $tasks */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List - Task Manager</title>
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
                    <li class="nav-item"><a class="nav-link active text-info" href="<?= base_url('/tasks') ?>">Task List</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/profile') ?>">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About</a></li>
                    <li class="nav-item ms-3">
                        <span class="text-light small me-2">Hello, <?= esc(session()->get('full_name')) ?></span>
                        <a href="<?= base_url('/logout') ?>" class="btn btn-outline-danger btn-sm">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h3 fw-bold text-white">All Tasks</h1>
            <p class="text-secondary small">Complete database view ordered by scheduled date.</p>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Add Task / Counter Card -->
        <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-lg mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-primary px-3 py-2">Total Tasks: <?= count($tasks) ?></span>
            </div>
            
            <form action="<?= base_url('/tasks/store') ?>" method="POST" class="row g-3">
                <?= csrf_field() ?>
                <div class="col-md-7">
                    <input type="text" name="title" class="form-control bg-dark text-light border-secondary" placeholder="Enter task title..." required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="task_date" class="form-control bg-dark text-light border-secondary" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Add</button>
                </div>
            </form>
        </div>

        <!-- Tasks Table -->
        <div class="card bg-secondary bg-opacity-10 border border-secondary rounded-4 shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead class="table-dark border-bottom border-secondary text-secondary">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3">Title</th>
                            <th class="py-3">Task Date</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tasks) && is_array($tasks)): ?>
                            <?php foreach ($tasks as $task): ?>
                                <?php $isCompleted = ($task['status'] === '1'); ?>
                                <tr>
                                    <td class="px-4 text-secondary">#<?= esc($task['id']) ?></td>
                                    <td class="fw-semibold <?= $isCompleted ? 'text-decoration-line-through text-secondary' : 'text-white' ?>">
                                        <?= esc($task['title']) ?>
                                    </td>
                                    <td class="text-secondary"><?= esc($task['task_date']) ?></td>
                                    <td>
                                        <span class="badge <?= $isCompleted ? 'bg-success' : 'bg-warning text-dark' ?> px-3 py-2">
                                            <?= $isCompleted ? 'Completed' : 'Pending' ?>
                                        </span>
                                    </td>
                                    <td class="text-end px-4">
                                        <a href="<?= base_url('/tasks/delete/' . $task['id']) ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">No tasks found. Add a task above to get started!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>