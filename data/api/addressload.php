<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
    $loginKey = json_decode(file_get_contents('PHP://input'));

    // Chuẩn bị câu truy vấn SQL
    $sql = "SELECT user_address.*
    FROM user_address
    INNER JOIN users ON user_address.email = users.email
    WHERE users.login_key = ?";


    // Chuẩn bị và thực thi câu lệnh SQL
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $loginKey);
        $stmt->execute();

        // Lấy kết quả của truy vấn
        $result = $stmt->get_result();

        // Chuyển kết quả thành mảng và trả về cho client (ví dụ: sử dụng json_encode để chuyển thành JSON)
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);

        $stmt->close();
    }
    $conn->close();
}
?>
