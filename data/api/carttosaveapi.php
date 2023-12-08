<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
    $data = json_decode(file_get_contents('php://input'), true);
    $productId = $data['product_id'];
    $loginKey = $data['login_key'];  // Sửa tên biến thành $loginKey
    $sql = "SELECT cart.*
            FROM cart
            INNER JOIN users ON cart.add_by = users.email
            WHERE cart.product_id = ? AND users.login_key = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $productId, $loginKey); 
    $stmt->execute();
    $result = $stmt->get_result();

    $productItem = $result->fetch_all(MYSQLI_ASSOC)[0];
    

    $sql = "SELECT * FROM saveproduct WHERE product_id = ? AND add_by = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $productItem['product_id'], $productItem['add_by']); 
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){ 
        $sql = "UPDATE saveproduct SET count = count + ? WHERE product_id = ? AND add_by = ?";
        $updateStmt = $conn->prepare($sql);
        $updateStmt->bind_param("iss", $productItem['count'], $productItem['product_id'], $productItem['add_by']);
        $updateStmt->execute();
    }else{
        $sql = "INSERT INTO saveproduct (product_id, add_by, add_in,count) VALUES(?,?,?,?)";
        $updateStmt = $conn->prepare($sql);
        $updateStmt->bind_param("sssi", $productItem['product_id'], $productItem['add_by'], $productItem['add_in'],$productItem['count']);
        $updateStmt->execute();
    }
    $deleteSql = "DELETE FROM cart WHERE product_id = ? AND add_by = ?";

    // Chuẩn bị và thực thi câu lệnh SQL
    $deleteStmt = $conn->prepare($deleteSql);

    if ($deleteStmt) {
        $deleteStmt->bind_param("ss", $productItem['product_id'], $productItem['add_by']);
        $deleteStmt->execute();
        echo 'done';
    $stmt->close();
    $conn->close();
    }
}
?>
