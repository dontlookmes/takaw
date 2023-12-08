<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
    $loginKey = json_decode(file_get_contents('PHP://input'));
    $sql = "SELECT *
    FROM users
    WHERE login_key = ?";

// Chuẩn bị và thực thi câu lệnh SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loginKey);
$stmt->execute();

// Lấy kết quả của truy vấn
$result = $stmt->get_result();

// Lấy dữ liệu từ kết quả truy vấn
$rows = [];
while ($row = $result->fetch_assoc()) {
    unset($row['login_key']);
    unset($row['password']);
    $rows[] = $row;
}
echo json_encode($rows[0]);

// $row = $result->fetch_assoc();
// print_r($row);
}
?>