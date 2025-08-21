<?php
// declare(strict_types=1);

// namespace App\Config;

// class Env {
//     public static function load(string $path): void {
//         if (!file_exists($path)) return;
//         $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//         foreach ($lines as $line) {
//             $line = trim($line);
//             if ($line === '' || str_starts_with($line, '#')) continue;
//             [$name, $value] = array_map('trim', explode('=', $line, 2));
//             $value = trim($value, " \t\n\r\0\x0B\"'");
//             putenv("$name=$value");
//             $_ENV[$name] = $value;
//             $_SERVER[$name] = $value;
//         }
//     }
//     public static function get(string $key, ?string $default=null): ?string {
//         $val = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
//         return $val === false ? $default : $val;
//     }
// }

// \App\Config\Env::load(dirname(__DIR__) . '/.env');

// class DB {
//     private static ?\PDO $pdo = null;
//     public static function conn(): \PDO {
//         if (self::$pdo === null) {
//             $host = Env::get('DB_HOST', '127.0.0.1');
//             $port = Env::get('DB_PORT', '3306');
//             $db   = Env::get('DB_DATABASE', 'capstone4_mvc');
//             $user = Env::get('DB_USERNAME', 'root');
//             $pass = Env::get('DB_PASSWORD', '');
//             $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";
//             $options = [
//                 \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
//                 \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
//                 \PDO::ATTR_EMULATE_PREPARES => false,
//             ];
//             self::$pdo = new \PDO($dsn, $user, $pass, $options);
//         }
//         return self::$pdo;
//     }
// }

// ضبط وضع التطوير
define('APP_DEBUG', true); // غيّرها إلى false في الإنتاج

// إعدادات قاعدة البيانات — استخدم قاعدة موجودة لديك (يمكنك إبقاؤها blogmvc لتستفيد من الإعداد السابق)
define('DB_HOST', 'localhost');
define('DB_NAME', 'blogmvc'); // أو capstone4_mvc إن أحببت
define('DB_USER', 'root');
define('DB_PASS', '');