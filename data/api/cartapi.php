<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'sqlconn.php';
    $loginKey  = file_get_contents("php://input");
        $sql = "SELECT email FROM users WHERE login_key = '$loginKey'";
        $result = $conn->query($sql);
        $email = mysqli_fetch_assoc($result)['email'];
        $sql = "SELECT * FROM cart WHERE add_by = '$email'";
        $result =$conn->query($sql);
       
        if($result->num_rows >0){
            $cartProduct=[];
                $sql = $sql = "SELECT product.*, cart.count FROM product
                JOIN cart ON product.product_id = cart.product_id
                WHERE cart.add_by = '$email'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $cartProduct[] = $row;
                }
               echo json_encode($cartProduct);
        }else {
            echo 'empty';
        }
  
    }











?>