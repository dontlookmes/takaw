<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendMail($mailaddress, $name, $title, $email) {


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/POP3.php';
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'phandinhhuy47@gmail.com';                     //SMTP username
    $mail->Password   = 'ubyb pozi tmoq oihw';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('takayama@gmail.com', 'タカヤマ');
    $mail->addAddress($mailaddress, $name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $email;
    $mail->AltBody = $email;
    
    $mail->send();
} catch (Exception $e) {
}
};

function randNum(){
    $randNum1 = rand(0, 9);
    $randNum2 = rand(0, 9);
    $randNum3 = rand(0, 9);
    $randNum4 = rand(0, 9);
    return $randNum = $randNum1 . $randNum2 . $randNum3 . $randNum4;
    
    };
?>