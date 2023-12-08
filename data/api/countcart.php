<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'sqlconn.php';
$data = json_decode(file_get_contents('php://input'), true);

// Chuyển đổi chuỗi thành số nguyên
$newValue = intval($data['new_value']);
$productId = $data['product_id'];
$loginKey = $data['login_key'];


// Cập nhật dữ liệu trong bảng cart
$sql = "UPDATE cart
        JOIN users ON cart.add_by = users.email
        SET cart.count = ?
        WHERE cart.product_id = ? AND users.login_key = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $newValue, $productId, $loginKey);

if ($stmt->execute()) {
    echo "done";
}

$stmt->close();
$conn->close();
}
?>
