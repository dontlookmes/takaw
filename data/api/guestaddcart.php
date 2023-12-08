<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'sqlconn.php';
$productId = json_decode(file_get_contents('PHP://input'));
$sql = "SELECT * FROM product WHERE product_id ='$productId'";
$result =$conn->query($sql);
$product = mysqli_fetch_array($result, MYSQLI_ASSOC);
sleep(1);
echo json_encode($product);
}