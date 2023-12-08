<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'function.php';
    require_once 'sqlconn.php';
    $data=json_decode(file_get_contents('PHP://input'),true);
    $email =$data['email'];
    $verifyCode = $data['verify_code'];
    $sql = "SELECT lastname FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
   
    $lastName = $result->fetch_assoc()['lastname'];
    sendMail($email,$lastName,'verifyCode',$verifyCode);
    echo 'done';
         
    
}




?>