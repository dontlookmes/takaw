<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once 'sqlconn.php';
    $data = json_decode(file_get_contents('php://input'), true);
    $loginKey = $data['login_key'];
    $productId = $data['product_id'];
    $deleteSql = "DELETE FROM saveproduct 
                    WHERE product_id = ? 
                    AND add_by = (SELECT email FROM users WHERE login_key = ?)";

    // Chuẩn bị và thực thi câu lệnh DELETE
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("ss", $productId, $loginKey);
    
    if ($deleteStmt->execute()) {
        echo 'done';
    }

}
?>