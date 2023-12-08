<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'sqlconn.php';
    
    $data = json_decode(file_get_contents('PHP://input'),true);
    
    $sql = "UPDATE users SET 
    name = ?,
    lastname = ?,
    name_romaji = ?,
    lastname_romaji = ?,
    gender = ?,
    tel_head = ?,
    tel_body = ?,
    tel_foot = ?
    WHERE login_key = ?";

// Chuẩn bị và thực thi câu lệnh SQL
$stmt = $conn->prepare($sql);

if ($stmt) {
$stmt->bind_param("sssssssss",
    $data['name'],
    $data['lastname'],
    $data['namerm'],
    $data['lastnamerm'],
    $data['gender'],
    $data['tel_head'],
    $data['tel_body'],
    $data['tel_foot'],
    $data['login_key']
);

$stmt->execute();

echo "done";

$stmt->close();
    
}

}


?>