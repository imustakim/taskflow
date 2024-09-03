<?php
class Template {
    /**
     * Render a template file with provided data.
     *
     * @param string $template
     * @param array $data
     */
    public function render(string $template, array $data = []): void {
        extract($data);
        include __DIR__ . "/../templates/{$template}.php";
    }
}
?>
