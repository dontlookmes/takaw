<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'sqlconn.php';
    $data = json_decode(file_get_contents('php://input'), true);
    $loginInput = $_POST['login'];
    $loginPass = $_POST['password'];

    // Kiểm tra xem input có phải là email hay không
    if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = '$loginInput'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Dữ liệu được tìm thấy
            $user = $result->fetch_assoc();
            $email = $user['email'];
            $password = $user['password'];
            $loginKey = $user['login_key'];
            if ($user['password'] && password_verify($loginPass, $user['password'])) {
                $response = ['status'=>'success','login_key'=>$loginKey];
                echo json_encode($response);
            } else {
                $response = ['status'=>'error','error_text'=>'あなたのパスワードが正しくありません。'];
                echo json_encode($response);
            }


        } else {
            // Không có dữ liệu được tìm thấy
            $response = ['status'=>'error','error_text'=>'あなたのメールアドレスはまだ登録されていません。'];
            echo json_encode($response);
        }
       
    } else if (ctype_digit($loginInput) && $loginInput[0]==0) {
        $sql = "SELECT * FROM users WHERE phonenumber = '$loginInput'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Dữ liệu được tìm thấy
            $user = $result->fetch_assoc();
            $phonenumber = $user['phonenumber'];
            $password = $user['password'];
            $loginKey = $user['login_key'];
            if ($user['password'] && password_verify($loginPass, $user['password'])) {
                $response = ['status'=>'success','login_key'=>$loginKey];
                echo json_encode($response);
            } else {
                $response = ['status'=>'error','error_text'=>'あなたのパスワードが正しくありません。'];
                echo json_encode($response);
            }

        } else {
            // Không có dữ liệu được tìm thấy
             $response = ['status'=>'error','error_text'=>'あなたの電話番号はまだ登録されていません。'];
             echo json_encode($response);
        }
    } else {
        // Nếu không phải cả email và số điện thoại
         $response = ['status'=>'error','error_text'=>'メールまたは電話番号を入力してください。'];
         echo json_encode($response);
    }
}
?>



