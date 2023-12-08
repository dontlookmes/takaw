<?php
    require_once 'sqlconn.php';
    $json = file_get_contents("php://input");
    $verifyData = json_decode($json, true);
    $signUpEmail = $verifyData['email'];
    $verifyInput = $verifyData['verifyInput'];
   
    $sql= "SELECT verifyCode FROM verification WHERE email = '$signUpEmail'";
    $result = $conn->query($sql);
    $result= mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($verifyInput==$result['verifyCode']){
        echo 'checked';
    }
    else {
        echo 'error';
    }
    mysqli_close($conn);
   
?>