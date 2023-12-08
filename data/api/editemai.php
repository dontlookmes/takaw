<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'function.php';
    require_once 'sqlconn.php';
    $data=json_decode(file_get_contents('PHP://input'),true);
    $email =$data['email'];
    $lastName= $data['lastname'];
    $verifyCode = $data['verifyCode'];
    $loginKey =$data['login_key'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $response=['status'=>'error','status_text'=>'このメールアドレスは既に登録されています。'];
        echo json_encode($response);
    }else{
         sendMail($email,$lastName,'verifyCode',$verifyCode);
         $response=['status'=>'success','status_text'=>'done'];
        echo json_encode($response);
         
    }
    
   
    
}
