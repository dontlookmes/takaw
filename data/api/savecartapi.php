<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once 'sqlconn.php';
    $loginKey = json_decode(file_get_contents('php://input'), true);
    
    // Câu lệnh SQL để lấy dữ liệu
    $selectSql = "SELECT product.*, saveproduct.count
                FROM product
                INNER JOIN saveproduct ON saveproduct.product_id = product.product_id
                INNER JOIN users ON users.email = saveproduct.add_by
                WHERE users.login_key = ?";

    // Chuẩn bị và thực thi câu lệnh SQL
    $selectStmt = $conn->prepare($selectSql);

        $selectStmt->bind_param("s", $loginKey);
        $selectStmt->execute();

        // Lấy kết quả của truy vấn
        $result = $selectStmt->get_result();

        // Chuyển kết quả thành mảng và trả về cho client
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    
        $selectStmt->close();
  
    $conn->close();
    
}
?>