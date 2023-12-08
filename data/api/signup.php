<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $json = file_get_contents("php://input");
    $formData = json_decode($json,true);
    require_once 'sqlconn.php';
    $nameRomaji = mysqli_real_escape_string( $conn, $formData['furigana-mei']);
    $lastNameRomaji = mysqli_real_escape_string( $conn, $formData['furigana-sei']);
    $name = mysqli_real_escape_string( $conn, $formData['kanji-mei']);
    $lastName  = mysqli_real_escape_string( $conn, $formData['kanji-sei']);
    $gender  = mysqli_real_escape_string( $conn, $formData['gender']);
    $signUpEmail = mysqli_real_escape_string( $conn, $formData['signin-email']);
    $password  = mysqli_real_escape_string( $conn, $formData['password']);
    $hashPassword =  password_hash($password, PASSWORD_DEFAULT);
    $confirmPassowrd = mysqli_real_escape_string( $conn, $formData['confirm_password']);
    $telHead = mysqli_real_escape_string( $conn, $formData['phone-head']);
    $telBody = mysqli_real_escape_string( $conn, $formData['phone-body']);
    $telFoot = mysqli_real_escape_string( $conn, $formData['phone-foot']);
    $phoneNumber = $telHead.$telBody.$telFoot;
    $signUpDate = date('Y-m-d');

    $sql = "INSERT INTO users (name_romaji, lastname_romaji, name, lastname, gender, email, tel_head, tel_body, tel_foot, phonenumber, password, signup_date) 
    VALUES ('$nameRomaji', '$lastNameRomaji', '$name', '$lastName', '$gender', '$signUpEmail', '$telHead', '$telBody', '$telFoot','$phoneNumber','$hashPassword', '$signUpDate')";
    mysqli_query($conn, $sql);

    $sql = "SELECT userId FROM users WHERE email = '$signUpEmail'";
    $result = $conn->query($sql);
    $result= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $userId = $result['userId'];
    
    $zipCodeHead = mysqli_real_escape_string($conn, $formData['zip-code-head']);
    $zipCodeFoot = mysqli_real_escape_string($conn, $formData['zip-code-foot']);
    $ken = mysqli_real_escape_string($conn, $formData['ken']);
    $shi = mysqli_real_escape_string($conn, $formData['shi']);
    $banchi = mysqli_real_escape_string($conn, $formData['banchi']);
    $tatemono = mysqli_real_escape_string($conn, $formData['tatemono']);

    $sql = "SELECT * FROM user_address WHERE email = '$signUpEmail'";
    $result = $conn->query($sql);
    $addressIndex =$result->num_rows;
        
    
    
    $sql = "INSERT INTO user_address (address_index,email, zipcode_head, zipcode_foot, ken, shi, banchi, tatemono) 
    VALUES ('$addressIndex','$signUpEmail', '$zipCodeHead', '$zipCodeFoot', '$ken', '$shi', '$banchi', '$tatemono')";
    mysqli_query($conn, $sql);
    
    $currentTimestamp = time();
    $loginKey = password_hash($currentTimestamp, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET login_key = '$loginKey' WHERE email = '$signUpEmail'";
    if(mysqli_query($conn, $sql)){
        echo $loginKey;
    };
mysqli_close($conn);
};
?>