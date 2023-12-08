<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'sqlconn.php';
$data = json_decode(file_get_contents('php://input'), true);


$productId = $data['product_id'];
$loginKey = $data['login_key'];
// Xóa dữ liệu từ bảng cart
$sql = "DELETE FROM cart 
        WHERE product_id = ? 
        AND add_by IN (SELECT email FROM users WHERE login_key = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $productId, $loginKey);

if ($stmt->execute()) {
    echo "done";
}

$stmt->close();
$conn->close();
}
?>
