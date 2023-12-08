<?php
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $signInEmail = $_POST["signin-email"];
    $telHead = $_POST['phone-head'];
    $telBody = $_POST['phone-body'];
    $telFoot = $_POST['phone-foot'];
    $phoneNumber = $telHead.$telBody.$telFoot;

    require_once 'sqlconn.php';
    
$sql = "SELECT * FROM users WHERE email = '$signInEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email đã tồn tại trong cơ sở dữ liệu
    $mailUsed = true;
} else {
   $mailUsed =false;
};
$sql = "SELECT * FROM users WHERE phonenumber = '$phoneNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // sdt đã tồn tại trong cơ sở dữ liệu
    $phoneUsed = true;
} else {
   $phoneUsed =false;
};
if($mailUsed === true || $phoneUsed === true){
    $signCheck= ["mailUsed" => $mailUsed, "phoneUsed" => $phoneUsed];
    $jsonStr = json_encode($signCheck);
    echo $jsonStr;
}
else {
    echo "checked";
};
};
mysqli_close($conn);
?>