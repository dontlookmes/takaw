<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'sqlconn.php';
    $data = json_decode(file_get_contents('PHP://input'),true);
    $email = $data['email'];
    $newPassword = $data['new_password'];
    $hashPassword=password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Thực hiện truy vấn
    $stmt->execute();
    $result = $stmt->get_result();
    $user= $result->fetch_assoc();


    if ($user['password'] && password_verify($newPassword, $user['password'])) {
        $response = ['status'=>'error','error_text'=>'新しいパスワードは元のパスワードと同じです。'];
        echo json_encode($response);
    }else{
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashPassword, $email);

        // Thực hiện truy vấn
        if ($stmt->execute()) {
            $response = ['status'=>'success','login_key'=>$user['login_key']];
            echo json_encode($response);
        }
    }
}

?>