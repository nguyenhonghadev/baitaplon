<?php
function addProductToCart($product) {
    if (!isset($_SESSION['user_cart'][$_SESSION['username']])) {
        $_SESSION['user_cart'][$_SESSION['username']] = array();
    }

    $found = false;
    foreach ($_SESSION['user_cart'][$_SESSION['username']] as $key => $prd) {
        if ($prd['name'] === $product['name']) {
            // Tăng số lượng sản phẩm nếu đã tồn tại
            $_SESSION['user_cart'][$_SESSION['username']][$key]['quantity'] += $product['quantity'];
            $found = true;
            break;
        }
    }

    if (!$found && $product['name'] !== 'Dưa leo') {
        $_SESSION['user_cart'][$_SESSION['username']][] = array(
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $product['quantity'],
            'image' => $product['image'],
            'max_quantity' => $product['max_quantity'] 
        );
    }
}
function generateRandomString($length = 5) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
function kiemtraHoa($str) {
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_upper($str[$i])) {
            return true;
        }
    }
    return false;
}

?>
<?php
if(isset($_GET['delete_oder'])&&(!empty($_GET['delete_oder']))){
    $order_id=$_GET['delete_oder'];
    require("../config/connect.php");
    mysqli_set_charset($conn,'utf8');
    $sql_delete= "DELETE FROM orders WHERE order_id = '$order_id'";
    $result_delete=mysqli_query($conn,$sql_delete);
    if($result_delete){
        echo"<script>
        alert('Bạn đã hủy đơn thành công!!!')
        window.location.href='info.php'
        </script>";
    }
    else{
        echo"<script>
        alert(' Hủy đơn hàng không thành công,Vui lòng liên hệ cửa hàng để biết thêm thông tin chi tiết!!!')
        window.location.href='info.php'
        </script>";
     
    }

}
?>







