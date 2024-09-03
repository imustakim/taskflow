<?php
require_once '../src/Database.php';
require_once '../src/Template.php';

// Initialize classes
$db = new Database();
$template = new Template();

// Get task ID from query parameters
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php?error=Task ID is required');
    exit();
}

// Fetch task details
$task = $db->getTaskById((int)$id);

if (!$task) {
    header('Location: index.php?error=Task not found');
    exit();
}

// Render header
$template->render('header', [
    'title' => 'TaskFlow - View Task',
    'heading' => 'Task Details'
]);
?>

<!-- Task Details Card -->
<div class="card">
    <div class="card-header">
        Task #<?= $task['id'] ?>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($task['title']) ?></h5>
        <p class="card-text"><?= nl2br(htmlspecialchars($task['description'])) ?></p>
        <p class="text-muted">Created At: <?= date('Y-m-d H:i:s', strtotime($task['created_at'])) ?></p>
        <a href="update.php?id=<?= $task['id'] ?>" class="btn btn-warning">Edit</a>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</div>

<?php
// Render footer
$template->render('footer');
?>
