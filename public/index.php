<?php
require_once '../src/Database.php';
require_once '../src/Template.php';

// Initialize classes
$db = new Database();
$template = new Template();

// Fetch all tasks
$tasks = $db->getTasks();

// Render header
$template->render('header', [
    'title' => 'TaskFlow - Task List',
    'heading' => 'All Tasks'
]);
?>

<!-- Action Button -->
<div class="mb-4">
    <a href="create.php" class="btn btn-success">Create New Task</a>
</div>

<!-- Tasks Table -->
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['id'] ?></td>
                    <td><?= htmlspecialchars($task['title']) ?></td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($task['created_at'])) ?></td>
                    <td class="text-center">
                        <a href="view.php?id=<?= $task['id'] ?>" class="btn btn-info btn-sm">View</a>
                        <a href="update.php?id=<?= $task['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $task['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No tasks found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
// Render footer
$template->render('footer');
?>
