<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
    $data = json_decode(file_get_contents('php://input'), true);
    $newPassword = $data['password'];
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $loginKey = $data['login_key'];

    // Cập nhật mật khẩu trong cơ sở dữ liệu
    $sql = "UPDATE users SET password = ? WHERE login_key = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashedPassword, $loginKey);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "done";
    }

    $stmt->close();
    $conn->close();
}
?>
