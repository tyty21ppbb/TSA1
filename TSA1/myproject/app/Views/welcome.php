<div class="row mb-4">
    <div class="col-12">
        <h2 class="fw-bold text-white mb-1">Today's Tasks</h2>
        <p class="text-secondary small"><?= date('F d, Y') ?></p>
    </div>
</div>

<div class="row g-4">
    <!-- Add Task Form -->
    <div class="col-12">
        <div class="card-f1 p-4 mb-3">
            <h5 class="fw-bold mb-3 text-white">Add Task</h5>
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

    <!-- Task List -->
    <div class="col-12">
        <div class="card-f1 p-4">
            <h5 class="fw-bold mb-3 text-white">Task List</h5>
            
            <?php if (empty($tasks)): ?>
                <div class="text-center py-4 text-secondary">
                    <p class="mb-0">No tasks found for today.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0" style="background: transparent;">
                        <thead>
                            <tr class="text-secondary small border-bottom border-secondary">
                                <th>Status</th>
                                <th>Title</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tasks as $task): ?>
                                <tr class="border-bottom border-secondary border-opacity-25">
                                    <td style="width: 120px;">
                                        <?php if ($task['status'] === 'completed'): ?>
                                            <span class="badge bg-success bg-opacity-20 text-success border border-success px-2 py-1">Completed</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning bg-opacity-20 text-warning border border-warning px-2 py-1">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="<?= $task['status'] === 'completed' ? 'text-decoration-line-through text-secondary' : 'text-white fw-semibold' ?>">
                                            <?= esc($task['title']) ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="<?= base_url('tasks/toggle/' . $task['id']) ?>" class="btn btn-sm btn-outline-info">
                                            Toggle Status
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