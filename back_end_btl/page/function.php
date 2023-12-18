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
        // Thêm sản phẩm vào giỏ hàng với max_quantity
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







