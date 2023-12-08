<?php
session_start();
require_once 'sqlconn.php';

function getProduct($conn, $cateLogValue, $reoderValue, $keyWord)
{
    $type = $cateLogValue;
    $orderBy = $reoderValue;

    $whereClause = "";
    if ($cateLogValue != 'all') {
        $whereClause .= "AND product_size = '$type'";
    }
    if ($keyWord != "") {
        $whereClause .= "AND product_name LIKE '%$keyWord%'";
    }

    if ($reoderValue == 0) {
        $sql = "SELECT * FROM product WHERE 1=1 $whereClause ORDER BY product_index DESC";
    } else {
        $sql = "SELECT * FROM product WHERE 1=1 $whereClause ORDER BY product_price_int $orderBy";
    }

    $result = mysqli_query($conn, $sql);
    return $result;
}

function getPageNum($conn, $cateLogValue, $keyWord)
{
   
    $type = $cateLogValue;
    

    $whereClause = "";
    if ($cateLogValue != 'all') {
        $whereClause .= "AND product_size = '$type'";
    }
    if ($keyWord != "") {
        $whereClause .= "AND product_name LIKE '%$keyWord%'";
    }
        $sql = "SELECT * FROM product WHERE 1=1 $whereClause";
   
    $result = mysqli_query($conn, $sql);
    return ceil($result->num_rows/18);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestData = json_decode(file_get_contents('php://input'), true);
    $cateLogValue = $requestData['cateLogValue'];
    $reoderValue = $requestData['reorderValue'];
    $keyWord = $requestData['keyWord'];
    $_SESSION['page_num'] =getPageNum($conn, $cateLogValue, $keyWord);
    $result = getProduct($conn, $cateLogValue, $reoderValue, $keyWord);

    // Xử lý kết quả và trả về dữ liệu JSON
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    // Lưu giá trị vào session
    echo json_encode($response);
    mysqli_free_result($result);
}

mysqli_close($conn);




            
?>