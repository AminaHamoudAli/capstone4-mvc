<?php
declare(strict_types=1);

use App\Core\Router;

session_start();

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/config/config.php';

$router = new Router();

/**
 * AuthController
 */
$router->get('/', fn() => header('Location: /login'));
$router->get('/login', [\App\Controllers\AuthController::class, 'showLogin']);
$router->post('/login', [\App\Controllers\AuthController::class, 'login']);
$router->get('/logout', [\App\Controllers\AuthController::class, 'logout']);

/**
 * EmployeeController
 */
$router->get('/employees', [\App\Controllers\EmployeeController::class, 'index'], ['auth' => true]);
$router->get('/employees/create', [\App\Controllers\EmployeeController::class, 'create'], ['auth' => true]);
$router->post('/employees/store', [\App\Controllers\EmployeeController::class, 'store'], ['auth' => true]);
$router->get('/employees/edit/{id}', [\App\Controllers\EmployeeController::class, 'edit'], ['auth' => true]);
$router->post('/employees/update/{id}', [\App\Controllers\EmployeeController::class, 'update'], ['auth' => true]);
$router->post('/employees/delete/{id}', [\App\Controllers\EmployeeController::class, 'delete'], ['auth' => true]);

/**
 * UsersController
 */
$router->get('/users', [\App\Controllers\UsersController::class, 'index'], ['auth' => true]);

// Dispatch
$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$request_url= $_SERVER['REQUEST_URI'];
switch($request_url){
    case"/capstone4-mvc1/":
        require "page/about.php";
        break;
    case"/capstone4-mvc1/":
        require "page/about.php";
        break;
    case"/capstone4-mvc1/":
        require "page/about.php";
        break;
    case"/capstone4-mvc1/":
        require "page/about.php";
        break;
    case"/capstone4-mvc1/":
        require "page/about.php";
        break;
    case"/capstone4-mvc1/":
        require "page/about.php";

        default:
         require "page/404";
}