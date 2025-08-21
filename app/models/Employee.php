<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
class Employee {
    private $conn;
    private $table = "employees";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($data) {
        // تجهيز الاستعلام مع حماية من SQL Injection
        $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table} (name, email, salary, department, contract, evaluation) 
             VALUES (:name, :email, :salary, :department, :contract, :evaluation)"
        );

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':salary', $data['salary']);
        $stmt->bindParam(':department', $data['department']);
        $stmt->bindParam(':contract', $data['contract']);
        $stmt->bindParam(':evaluation', $data['evaluation']);

        if($stmt->execute()){
            return $this->conn->lastInsertId(); // 
        } else {
            return false;
        }
    }
}
?>

