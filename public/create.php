<?php
require_once '../src/Database.php';
require_once '../src/Template.php';
require_once '../src/Task.php';

// Initialize classes
$db = new Database();
$template = new Template();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = new Task($_POST['title'], $_POST['description']);
    if ($db->createTask($task)) {
        header('Location: index.php?success=Task created successfully');
        exit();
    } else {
        $error = 'Error creating task. Please try again.';
    }
}

// Render header
$template->render('header', [
    'title' => 'TaskFlow - Create Task',
    'heading' => 'Create New Task'
]);
?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<!-- Task Form -->
<?php
$template->render('task_form', [
    'buttonText' => 'Create Task'
]);

// Render footer
$template->render('footer');
?>
