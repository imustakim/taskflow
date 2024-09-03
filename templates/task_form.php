<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Task Title</label>
        <input
            type="text"
            class="form-control"
            id="title"
            name="title"
            value="<?= isset($task['title']) ? $task['title'] : '' ?>"
            required
        >
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Task Description</label>
        <textarea
            class="form-control"
            id="description"
            name="description"
            rows="5"
            required
        ><?= isset($task['description']) ? $task['description'] : '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($buttonText) ? $buttonText : 'Submit' ?></button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>
