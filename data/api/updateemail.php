<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';

    $data = json_decode(file_get_contents('php://input'), true);
    $newEmail = $data['new_email'];
    $loginKey = $data['login_key'];
  

    // Thực hiện truy vấn UPDATE để cập nhật email mới và login_key mới
    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE login_key = ?");
    $stmt->bind_param("ss", $newEmail, $loginKey);

    // Thực hiện truy vấn
    if ($stmt->execute()) {
       
        echo 'done';
    } 
    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>
