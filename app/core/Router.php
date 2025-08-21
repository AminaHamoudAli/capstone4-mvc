<?php
namespace App\Core;

class Router
{
    private array $routes = [];
    private array $middlewares = [];

    public function __construct()
    {
        // تعريف ميدلوير بسيط للتحقق من تسجيل الدخول
        $this->middlewares['auth'] = function () {
            if (!Auth::check()) {
                header('Location: ' . BASE_URL . '/login');
                exit;
            }
        };
    }

    public function get(string $path, array $handler, array $middlewares = []): void
    {
        $this->add('GET', $path, $handler, $middlewares);
    }

    public function post(string $path, array $handler, array $middlewares = []): void
    {
        $this->add('POST', $path, $handler, $middlewares);
    }

    private function add(string $method, string $path, array $handler, array $middlewares): void
    {
        $this->routes[] = compact('method', 'path', 'handler', 'middlewares');
    }

    public function dispatch(string $method, string $uri): void
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;

            $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<$1>[^/]+)', $route['path']);
            $pattern = '#^' . rtrim($pattern, '/') . '/?$#';

            if (preg_match($pattern, $uri, $matches)) {
                // شغّل الميدلويرات
                foreach ($route['middlewares'] as $mw) {
                    if (isset($this->middlewares[$mw])) {
                        ($this->middlewares[$mw])();
                    }
                }

                [$class, $methodName] = $route['handler'];
                $controller = new $class();

                // استخرج براميترات المسار المسماة
                $params = array_filter($matches, '\is_string', ARRAY_FILTER_USE_KEY);
                call_user_func_array([$controller, $methodName], $params);
                return;
            }
        }

        // لم يتم العثور على مسار
        http_response_code(404);
        echo '<h1>404 Not Found</h1>';
    }
}