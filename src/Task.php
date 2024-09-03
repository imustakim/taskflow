<?php
class Task {
    private string $title;
    private string $description;

    public function __construct(string $title, string $description) {
        $this->setTitle($title);
        $this->setDescription($description);
    }

    /**
     * Get the task title.
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Set the task title.
     *
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = htmlspecialchars(strip_tags($title));
    }

    /**
     * Get the task description.
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Set the task description.
     *
     * @param string $description
     */
    public function setDescription(string $description): void {
        $this->description = htmlspecialchars(strip_tags($description));
    }
}
?>
