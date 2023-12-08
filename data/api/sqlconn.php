<?php
 $conn = mysqli_connect('localhost', 'root', '', 'takayama');
 if (!$conn) {
     die("接続失敗：" . mysqli_connect_error());
 }
 
 ?>