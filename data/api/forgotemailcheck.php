<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'sqlconn.php';
$email= json_decode(file_get_contents('PHP://input'), true);
$email = mysqli_real_escape_string($conn, $email);
$sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email đã tồn tại trong cơ sở dữ liệu
        echo "true";
    } else {
        // Email không tồn tại trong cơ sở dữ liệu
        echo "false";
    }

}
?>