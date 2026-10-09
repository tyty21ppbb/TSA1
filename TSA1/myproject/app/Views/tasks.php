<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-dark text-light">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 border-bottom border-secondary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('tasks') ?>">Task List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('profile') ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item d-flex align-items-center text-light me-3 small">
                            Hello, <?= esc(session()->get('full_name')) ?>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger btn-sm" href="<?= base_url('logout') ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm" href="<?= base_url('login') ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-3">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-white mb-1">All Tasks</h2>
                <p class="text-secondary small mb-0">Complete database view ordered by scheduled date.</p>
            </div>
        </div>

        <!-- Quick Add Form -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary bg-opacity-20 text-info border border-info px-3 py-2">
                            Total Tasks: <?= count($tasks ?? []) ?>
                        </span>
                    </div>
                    <form action="<?= base_url('tasks/create') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="input-group">
                            <input type="text" name="title" class="form-control bg-dark text-light border-secondary" placeholder="Task title..." required>
                            <input type="date" name="task_date" class="form-control bg-dark text-light border-secondary" value="<?= date('Y-m-d') ?>" required>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa-solid fa-plus me-1"></i> Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary bg-opacity-10 border border-secondary p-4 rounded-4 shadow-sm">
                    <?php if (empty($tasks)): ?>
                        <div class="text-center py-5 text-secondary">
                            <i class="fa-solid fa-inbox fa-2x mb-2 text-muted"></i>
                            <p class="mb-0">No tasks found in database.</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover align-middle mb-0" style="background: transparent;">
                                <thead>
                                    <tr class="text-secondary small border-bottom border-secondary">
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Task Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tasks as $task): ?>
                                        <tr class="border-bottom border-secondary border-opacity-25">
                                            <td class="text-secondary small">#<?= esc($task['id']) ?></td>
                                            <td>
                                                <span class="<?= ($task['status'] == 1 || $task['status'] === 'completed') ? 'text-decoration-line-through text-secondary' : 'text-white fw-semibold' ?>">
                                                    <?= esc($task['title']) ?>
                                                </span>
                                            </td>
                                            <td class="text-secondary small"><?= esc($task['task_date'] ?? date('Y-m-d')) ?></td>
                                            <td>
                                                <?php if ($task['status'] == 1 || $task['status'] === 'completed'): ?>
                                                    <span class="badge bg-success bg-opacity-20 text-success border border-success px-2 py-1">
                                                        <i class="fa-solid fa-check me-1"></i>Completed
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning bg-opacity-20 text-warning border border-warning px-2 py-1">
                                                        Pending
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-outline-info me-1">
                                                    Edit
                                                </a>
                                                <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" 
                                                   class="btn btn-sm btn-outline-danger" 
                                                   onclick="return confirm('Are you sure you want to archive this task?');">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>