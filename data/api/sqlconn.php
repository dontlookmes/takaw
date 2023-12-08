<?php
 $conn = mysqli_connect('localhost', 'root', '', 'takaw');
 if (!$conn) {
     die("接続失敗：" . mysqli_connect_error());
 }
 
 ?>