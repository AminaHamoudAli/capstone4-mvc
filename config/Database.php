<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private static $instance = null;

    public static function getConnection() {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=localhost;dbname=capstone4_mvc;charset=utf8",
                    "root",      //  اليوزر
                    ""           //  الباسورد
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
                // echo "Connection error: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}


