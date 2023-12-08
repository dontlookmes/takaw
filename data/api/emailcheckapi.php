<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'function.php';
$data =json_decode(file_get_contents('PHP://input'), true);
$email = $data['email'];
$name = $data['name'];
$verifyCode = $data['verifi_code'];
sendMail($email,$name,'verifyCode',$verifyCode);
}
?>