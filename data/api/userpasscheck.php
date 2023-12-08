<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
    $data = json_decode(file_get_contents('php://input'), true);
    $loginKey = $data['login_key'];
    $password = $data['password'];

    // Truy vấn SQL để lấy mật khẩu từ cơ sở dữ liệu
    $sql = "SELECT password FROM users WHERE login_key = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $loginKey);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy mật khẩu từ kết quả truy vấn
        $row = $result->fetch_assoc();
        $dbPassword = $row['password'];

        // So sánh mật khẩu
        if (password_verify($password, $dbPassword)) {
            $response=['status'=>'success'];
            echo json_encode($response);
        } else {
            $response=['status'=>'error','error_text'=>'パスワードが確認できません。'];
            echo json_encode($response);
        }
    }
    $stmt->close();
    $conn->close();
}
?>
