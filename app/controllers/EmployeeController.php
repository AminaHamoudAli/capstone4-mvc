<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

// استدعاء الملفات
// require_once __DIR__ . '/../config/Database.php';
// require_once __DIR__ . '/../models/Employee.php';

// use App\Config\Database;

// // إنشاء الاتصال
// try {
//     $conn = Database::getConnection();
// } catch (PDOException $e) {
//     echo json_encode(['error' => 'فشل الاتصال بقاعدة البيانات ', 'details' => $e->getMessage()]);
//     exit;
// }

// // كائن الموديل
// $employeeModel = new Employee($conn);


// $data = json_decode(file_get_contents("php://input"), true);

// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
 
//     http_response_code(200);
//     exit;
// }

// if ($data) {
//     $id = $employeeModel->add($data);
//     if ($id) {
//         echo json_encode(['message' => 'تمت إضافة الموظف ', 'id' => $id]);
//     } else {
//         echo json_encode(['error' => 'حدث خطأ أثناء الإضافة ']);
//     }
// } else {
//     echo json_encode(['error' => 'لم يتم استلام أي بيانات ']);
// }

   
   



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'salary' => $_POST['salary'],
        'department' => $_POST['department'],
        'contract' => $_POST['contract'],
        'evaluation' => $_POST['evaluation']
    ];
    $id = $employeeModel->add($data);
    echo json_encode(['message'=>'تمت إضافة الموظف ','id'=>$id]);
}


