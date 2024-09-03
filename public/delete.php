<?php
require_once '../src/Database.php';

// Initialize Database
$db = new Database();

// Get task ID from query parameters
$id = $_GET['id'] ?? null;

if ($id && $db->deleteTask((int)$id)) {
    header('Location: index.php?success=Task deleted successfully');
} else {
    header('Location: index.php?error=Error deleting task');
}
exit();
?>
