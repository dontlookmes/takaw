<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'sqlconn.php';

// Kiểm tra và lấy dữ liệu đầu vào
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra xem có đủ dữ liệu đầu vào không
if (!isset($data['product_id']) || !isset($data['user'])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input data"]);
    exit;
}

$productId = $data['product_id'];
$loginKey = $data['user'];

// Lấy email từ cơ sở dữ liệu
$stmtEmail = $conn->prepare("SELECT email FROM users WHERE login_key = ?");
$stmtEmail->bind_param("s", $loginKey);
$stmtEmail->execute();
$resultEmail = $stmtEmail->get_result();

if ($resultEmail->num_rows === 0) {
    http_response_code(401);
    echo json_encode(["error" => "User not authorized"]);
    exit;
}

$email = $resultEmail->fetch_assoc()['email'];

// Kiểm tra giỏ hàng
$stmtCart = $conn->prepare("SELECT * FROM cart WHERE add_by = ? AND product_id=?");
$stmtCart->bind_param("ss", $email,$productId);
$stmtCart->execute();
$resultCart = $stmtCart->get_result();

if ($resultCart->num_rows > 0) {
    // Cập nhật giỏ hàng
    $cartData = $resultCart->fetch_assoc();
    $count = $cartData['count'] + 1;

    $stmtUpdate = $conn->prepare("UPDATE cart SET count = ? WHERE add_by = ? AND product_id=?");
    $stmtUpdate->bind_param("iss", $count, $email,$productId);

    if ($stmtUpdate->execute()) {
        sleep(1);
        echo json_encode(["status" => "done"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Internal Server Error"]);
    }
} else {
    // Thêm mới vào giỏ hàng
    $date = date('Y-m-d');
    $stmtInsert = $conn->prepare("INSERT INTO cart (product_id, add_by, add_in) VALUES (?, ?, ?)");
    $stmtInsert->bind_param("sss", $productId, $email, $date);

    if ($stmtInsert->execute()) {
        sleep(1);
        echo json_encode(["status" => "done"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Internal Server Error"]);
    }
}

mysqli_close($conn);
}

// require_once 'sqlconn.php';

// // Kiểm tra và lấy dữ liệu đầu vào
// $data = json_decode(file_get_contents('php://input'), true);

// $productId = $data['product_id'];
// $loginKey = $data['user'];

// // Lấy email từ cơ sở dữ liệu
// $stmtEmail = $conn->prepare("SELECT email FROM users WHERE login_key = ?");
// $stmtEmail->bind_param("s", $loginKey);
// $stmtEmail->execute();
// $resultEmail = $stmtEmail->get_result();


//     $email = $resultEmail->fetch_assoc()['email'];
//     // Kiểm tra giỏ hàng
//     $stmtCart = $conn->prepare("SELECT * FROM cart WHERE add_by = ?");
//     $stmtCart->bind_param("s", $email);
//     $stmtCart->execute();
//     $resultCart = $stmtCart->get_result();

//     if ($resultCart->num_rows > 0) {
//         // Cập nhật giỏ hàng
//         $cartData = $resultCart->fetch_assoc();
//         $count = $cartData['count'] + 1;

//         $stmtUpdate = $conn->prepare("UPDATE cart SET count = ? WHERE add_by = ?");
//         $stmtUpdate->bind_param("is", $count, $email);

//         if ($stmtUpdate->execute()) {
//             sleep(1);
//             echo 'done';
//         } 
//     } else {
//         // Thêm mới vào giỏ hàng
//         $date = date('Y-m-d');
//         $stmtInsert = $conn->prepare("INSERT INTO cart (product_id, add_by, add_in) VALUES (?, ?, ?)");
//         $stmtInsert->bind_param("sss", $productId, $email, $date);

//         if ($stmtInsert->execute()) {
//             sleep(1);
//             echo 'done';
//         }
//     }
//     mysqli_close($conn);
?>











