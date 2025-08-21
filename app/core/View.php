<?php
 namespace App\Core;

class View
{
    public static function make(string $view, array $data = []): string {
        $path = dirname(__DIR__) . "/Views/" . str_replace('.', '/', $view) . ".php";
        if (!file_exists($path)) throw new \RuntimeException("View not found: $view");
        extract($data);
        ob_start();
        include dirname(__DIR__) . "/Views/layouts/main.php";
        return ob_get_clean();
    }
    public static function section(string $view, array $data = []): void {
        $path = dirname(__DIR__) . "/Views/" . str_replace('.', '/', $view) . ".php";
        extract($data);
        include $path;
    }
}
