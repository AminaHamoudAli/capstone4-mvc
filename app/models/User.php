<?php
namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function all(): array
    {
        $stmt = $this->pdo->query('SELECT id, name, email, created_at FROM users ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function create(string $name, string $email, string $password): int
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $hash]);
        return (int)$this->pdo->lastInsertId();
    }
}