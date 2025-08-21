<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        $userModel = new User();
        $users = $userModel->all();
        $this->render('users/index', compact('users'));
    }
}