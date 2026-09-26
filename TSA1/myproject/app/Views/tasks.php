<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold text-white mb-1">All Tasks</h2>
        <p class="text-secondary small mb-0">Complete database view ordered by scheduled date.</p>
    </div>
</div>

<!-- Quick Add Form -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card-f1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-primary bg-opacity-20 text-info border border-info px-3 py-2">
                    Total Tasks: <?= count($tasks ?? []) ?>
                </span>
            </div>
            <form action="<?= base_url('tasks/add') ?>" method="POST">
                <div class="input-group">
                    <input type="text" name="title" class="form-control form-control-f1" placeholder="Task title..." required>
                    <input type="date" name="task_date" class="form-control form-control-f1" value="<?= date('Y-m-d') ?>">
                    <button type="submit" class="btn btn-f1-add px-4">
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
        <div class="card-f1 p-4">
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
                <i class="fa-solid fa-check me-1"></i> Completed
            </span>
        <?php else: ?>
            <span class="badge bg-warning bg-opacity-20 text-warning border border-warning px-2 py-1">
                Pending
            </span>
        <?php endif; ?>
    </td>
    <td class="text-end">
        <a href="<?= base_url('tasks/toggle/' . $task['id']) ?>" class="btn btn-sm btn-outline-info me-1">
            Toggle Status
        </a>
        <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" 
           class="btn btn-sm btn-outline-danger" 
           onclick="return confirm('Are you sure you want to permanently delete this task?');">
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