<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';

    // Lấy giá trị từ dữ liệu JSON
    $data = json_decode(file_get_contents('php://input'), true);
    $loginKey = mysqli_real_escape_string($conn, $data['login_key']);
    $addressIndex = mysqli_real_escape_string($conn, $data['address_index']);

   
        // Xóa hàng từ bảng user_address dựa trên điều kiện
        $deleteQuery = "DELETE user_address FROM user_address
                        INNER JOIN users ON user_address.email = users.email
                        WHERE user_address.address_index = '$addressIndex' AND users.login_key = '$loginKey'";

        if (mysqli_query($conn, $deleteQuery)) {
             // Cập nhật lại chỉ số index
             $updateQuery = "UPDATE user_address
             JOIN (SELECT @count := -1) AS init
             SET user_address.address_index = @count := @count + 1
             WHERE user_address.email IN (SELECT email FROM users WHERE login_key = '$loginKey')
             ORDER BY user_address.address_index;";

            if (mysqli_query($conn, $updateQuery)) {
                echo "done";
            }
        }
}

    // Đóng kết nối
    mysqli_close($conn);

?>
