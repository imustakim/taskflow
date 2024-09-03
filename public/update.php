<?php
require_once '../src/Database.php';
require_once '../src/Template.php';
require_once '../src/Task.php';

// Initialize classes
$db = new Database();
$template = new Template();

// Get task ID from query parameters
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php?error=Task ID is required');
    exit();
}

// Fetch existing task
$taskData = $db->getTaskById((int)$id);

if (!$taskData) {
    header('Location: index.php?error=Task not found');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = new Task($_POST['title'], $_POST['description']);
    if ($db->updateTask((int)$id, $task)) {
        header('Location: index.php?success=Task updated successfully');
        exit();
    } else {
        $error = 'Error updating task. Please try again.';
    }
}

// Render header
$template->render('header', [
    'title' => 'TaskFlow - Update Task',
    'heading' => 'Update Task'
]);
?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<!-- Task Form -->
<?php
$template->render('task_form', [
    'task' => $taskData,
    'buttonText' => 'Update Task'
]);

// Render footer
$template->render('footer');
?>
