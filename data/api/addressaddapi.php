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
    $userIdQuery = "SELECT email FROM users WHERE login_key = '$loginKey'";
    $userIdResult = mysqli_query($conn, $userIdQuery);

    if ($userIdResult) {
        $row = mysqli_fetch_assoc($userIdResult);
        $email= $row['email'];
         
        $sql = "SELECT * FROM user_address WHERE email = '$email'";
        $result = $conn->query($sql);
        $addressIndex =$result->num_rows;
        
        $insertQuery = "INSERT INTO user_address (address_index,email, zipcode_head, zipcode_foot, ken, shi, banchi, tatemono)
        VALUES ('$addressIndex','$email', '$zipCodeHead', '$zipCodeFoot', '$ken', '$shi', '$banchi', '$tatemono')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "done";
        } 
    }
}




