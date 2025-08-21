<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        if (Auth::check()) {
            $this->redirect('/users');
        }
        $this->render('auth/login');
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (Auth::attempt($email, $password)) {
            $this->redirect('/users');
        } else {
            $this->render('auth/login', ['error' => 'بيانات الدخول غير صحيحة']);
        }
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/login');
    }
}