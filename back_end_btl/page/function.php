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
        $_SESSION['user_cart'][$_SESSION['username']][] = $product;
    }
}
$product=array(
    'name'=>'Dưa leo',
    'price'=>'25000đ',
    'quantity'=>1,
    'image'=>'../image/tráng miệng/dưa leo.jpg',
);

?>