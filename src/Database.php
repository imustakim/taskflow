<?php
class Database {
    private mysqli $conn;

    public function __construct() {
        $this->conn = new mysqli("db", "root", "root", "taskflow");

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * Fetch all tasks from the database.
     *
     * @return array
     */
    public function getTasks(): array {
        $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Fetch a single task by its ID.
     *
     * @param int $id
     * @return array|null
     */
    public function getTaskById(int $id): ?array {
        $sql = "SELECT * FROM tasks WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc() ?: null;
    }

    /**
     * Create a new task.
     *
     * @param Task $task
     * @return bool
     */
    public function createTask(Task $task): bool {
        $sql = "INSERT INTO tasks (title, description) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $task->getTitle(), $task->getDescription());

        return $stmt->execute();
    }

    /**
     * Update an existing task.
     *
     * @param int $id
     * @param Task $task
     * @return bool
     */
    public function updateTask(int $id, Task $task): bool {
        $sql = "UPDATE tasks SET title = ?, description = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $task->getTitle(), $task->getDescription(), $id);

        return $stmt->execute();
    }

    /**
     * Delete a task by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteTask(int $id): bool {
        $sql = "DELETE FROM tasks WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    /**
     * Close the database connection.
     */
    public function __destruct() {
        $this->conn->close();
    }
}
?>
