<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $loginKey = json_decode(file_get_contents('PHP://input'),true);
    $stmt = $conn->prepare($sql);

    $sql = "SELECT cart.*
            FROM cart
            INNER JOIN users ON cart.email = users.email
            WHERE users.login_key = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $loginKey);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Lấy dữ liệu từ kết quả
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            // In hoặc xử lý dữ liệu theo nhu cầu của bạn
            print_r($rows);
        } else {
            echo "Có lỗi xảy ra khi thực hiện truy vấn: " . $stmt->error;
            // Ghi log hoặc xử lý lỗi khác tùy thuộc vào yêu cầu của bạn
        }

        $stmt->close();  
    }
}
?>