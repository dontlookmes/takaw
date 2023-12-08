<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
  

    $data= json_decode(file_get_contents('PHP://input'),true);
    $zipCodeHead = mysqli_real_escape_string($conn, $data['zip-code-head']);
    $zipCodeFoot = mysqli_real_escape_string($conn, $data['zip-code-foot']);
    $ken = mysqli_real_escape_string($conn, $data['ken']);
    $shi = mysqli_real_escape_string($conn, $data['shi']);
    $banchi = mysqli_real_escape_string($conn, $data['banchi']);
    $tatemono = mysqli_real_escape_string($conn, $data['tatemono']);
    $loginKey = $data['login_key'];
    $addressIndex =$data['address_index'];
    $userIdQuery = "SELECT email FROM users WHERE login_key = '$loginKey'";
    $userIdResult = mysqli_query($conn, $userIdQuery);

    if ($userIdResult) {
        $row = mysqli_fetch_assoc($userIdResult);
        $email= $row['email'];
         
        // Cập nhật dữ liệu trong bảng cart
        $sql = "UPDATE user_address
        SET zipcode_head = ?,zipcode_foot=?, ken=?, shi=?, banchi=?, tatemono=?
        WHERE email = ? AND address_index = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissssss", $zipCodeHead, $zipCodeFoot, $ken, $shi, $banchi, $tatemono, $email, $addressIndex);

        if ($stmt->execute()) {
        echo "done";
        }
    }
}


