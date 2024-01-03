<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];

    if (isset($_SESSION['user_cart'][$_SESSION['username']][$key])) {
        unset($_SESSION['user_cart'][$_SESSION['username']][$key]);
    }
    header("Location: cart.php");
    exit();
}

?>
<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    require('../config/connect.php');
    $sql="SELECT oder_quantity, oder_prd FROM orders WHERE order_id = '$order_id'";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantity = $row['oder_quantity'];
        $prd_name = $row['oder_prd'];
        
       $sql ="SELECT prd_quantity FROM products WHERE prd_name = '$prd_name'";
       $result1=$conn->query($sql);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $quantity_old = $row1['prd_quantity'];
            $quantity_update = (int)$quantity_old + (int)$quantity;
            $sql="UPDATE products SET prd_quantity = '$quantity_update' WHERE prd_name = '$prd_name'";
           $result=$conn->query($sql);
        }
   // Cập nhật trạng thái đơn hàng thành 'Canceled'
   $cancel_order_sql = "UPDATE orders SET status = 'Hủy Đơn' WHERE order_id = '$order_id'";
   $cancel_order_result = $conn->query($cancel_order_sql);

$result1=$conn->query($sql);
       if ($result1===TRUE){
        $conn->close();
                echo "<script>alert('Bạn đã hủy đơn thành công');window.location.href='info.php';</script>";
       }
    }
}
?>


