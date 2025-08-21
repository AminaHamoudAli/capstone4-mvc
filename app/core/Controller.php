<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = []): string {
        return View::make($view, $data);
    }
    protected function redirect(string $to): void {
        header("Location: $to"); exit;
    }
}
