<?php
     $conn = mysqli_connect('localhost', 'root', '', 'takayama');
     if (!$conn) {
         die("接続失敗：" . mysqli_connect_error());
     }
     $sql= "SELECT * FROM product WHERE product_id = 'CH-1515 go'";
     $result = $conn->query($sql);
    
     if ($result) {
      // Duyệt qua từng dòng dữ liệu và xử lý
      while ( $CH = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Xử lý dữ liệu ở đây
         
          $id = $CH['product_id'];
          $name = $CH['product_name'];
          $newName = '小型収納庫 '.$CH['product_color'].' '.$name;
          $img =[$id, 'CH-1515s'];
          $imgArray = json_encode($img);
        $sql = "UPDATE product SET product_img = '$imgArray' WHERE product_id= '$id'";
        if($conn->query($sql)){
          echo 'dfds';
        };
        

      }
  
      
      $result->free();
  } else {
      echo "Lỗi truy vấn: " . $mysqli->error;
  }

        ?>