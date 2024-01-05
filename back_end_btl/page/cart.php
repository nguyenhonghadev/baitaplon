<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>alert('Bạn chưa đăng nhập')</script>";
    echo "<script>window.location.href='../user/login.php';</script>";
    exit(); // Đảm bảo không có mã PHP hoặc output nào sau đó
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>HK Restaurant</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="..//lib//animate//animate.min.css" rel="stylesheet">
    <link href="..//lib//owlcarousel//assets//owl.carousel.min.css" rel="stylesheet">
    <link href="..//lib//tempusdominus//css//tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="..//css//bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Template Stylesheet -->
    <link href="..//css//style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="..//assets//css//responsive.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
       <?php 
        echo"<script>
        $(document).ready(function(){
            $('#cart').addClass('active');
        });
        </script>";
       include('../config/header1.php');
       ?>
    <!-- giỏ hàng -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Ảnh Sản Phẩm</th>
                                    <th class="product-name">Tên Sản Phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                                if (isset($_SESSION['user_cart'][$_SESSION['username']])) {
                                    foreach ($_SESSION['user_cart'][$_SESSION['username']] as $key => $prd) {
                                        $name = $prd['name'];
                                        require('../config/connect.php');
                                        $sql = "SELECT * FROM products WHERE prd_name = '$name'";
                                        $kq=$conn->query($sql);
                                        $row = $kq->fetch_assoc();
                                        echo '<tr class="table-body-row">';
                                        echo '<td class="product-rm"><a href="remove_product.php?key=' . $key . '"><i class="far fa-window-close"></i></a></td>';
                                        echo '<td class="product-image"><img src="' . $prd['image'] . '" alt="' . $prd['name'] . '"></td>';
                                        echo '<td class="product-name">' . $prd['name'] . '</td>';
                                        echo '<td class="product-price">' . $prd['price'] . '</td>';
                                        echo '<td class="product-quantity">
                                        <input type="number" placeholder="0" value="' . $prd["quantity"] . '" data-key="' . $key . '" data-product="' . $prd["name"] . '" max="' . $row['prd_quantity'] . '" min="0" class="quantity-input">
                                        </td>';                                            
                                        $total_price =(float) $prd['quantity'] * (float)$prd['price'];
                                        $formatted_total_price = number_format($total_price, 2, '.', ',');
                                        echo '<td class="product-total">' . $formatted_total_price . '</td>';
                                        
                                        echo '</tr>';
                                        $conn->close();
                                    }
                                }
                                    ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="total-section">
                                    <table class="total-table">
                                        <thead class="total-table-head">
                                            <tr class="table-total-row">
                                                <th>Thành Phần</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                $total_amount = 0;
                                                if (isset($_SESSION['user_cart'][$_SESSION['username']])) {
                                                    foreach ($_SESSION['user_cart'][$_SESSION['username']] as $key => $prd) {
                                                        $total_price = (float)$prd['quantity'] * (float)$prd['price'];
                                                        $total_amount += $total_price;
                                                        $formatted_total_price = number_format($total_price, 2, ".", ",");
                                                        echo '<tr class="total-data">
                                                                <td><strong>' . $prd['name'] . '</strong></td>
                                                                <td>' . $prd['quantity'] . '</td>
                                                                <td>' . $formatted_total_price . '</td>
                                                            </tr>';
                                                    }
                                                }

                                                // Thêm chi phí vận chuyển
                                                $shipping_cost = 25000;
                                                $total_amount += $shipping_cost;

                                                // Hiển thị dòng và giá trị của vận chuyển trong bảng
                                                echo '<tr class="total-data">
                                                        <td><strong>Vận chuyển </strong></td>
                                                        <td></td>
                                                        <td>' . number_format($shipping_cost, 2, ".", ",") . 'đ</td>
                                                    </tr>';

                                                // Hiển thị tổng số tiền
                                                echo '<tr class="total-data">
                                                        <td><strong>Tổng  </strong></td>
                                                        <td></td>
                                                        <td>' . number_format($total_amount, 2, ".", ",") . 'đ</td>
                                                    </tr>';
                                                ?>

                                        </tbody>
                                    </table>
                                    <div class="cart-buttons">
                                        <a href="cart.php" class="boxed-btn">Làm Mới</a>
                                        <a href="thanhtoan.php" class="boxed-btn black">Thanh Toán</a>
                                    </div>
                                </div>

                                <div class="coupon-section">
                                    <h3>Voucher</h3>
                                    <div class="coupon-form-wrap">
                                        <form action="">
                                            <p><input type="text" placeholder="Coupon"></p>
                                            <p><input type="submit" value="Xác Nhận"></p>
                                        </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php


if(isset($_POST['key']) && isset($_POST['quantity']) && isset($_POST['product'])) {
    $key = $_POST['key'];
    $quantity = $_POST['quantity'];
    $product = $_POST['product'];

    // Xử lý cập nhật số lượng trong giỏ hàng
    if (isset($_SESSION['user_cart'][$_SESSION['username']][$key]) && $_SESSION['user_cart'][$_SESSION['username']][$key]['name'] === $product) {
        $_SESSION['user_cart'][$_SESSION['username']][$key]['quantity'] = $quantity;
        echo 'Cập nhật số lượng thành công!';
    } 
    }
?>
   <?php
   include('../config/footer.php')
   ?>

    <!-- Back to Top -->
    <a href="contact.html" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="back"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="..//lib//wow//wow.min.js"></script>
    <script src="..//lib//easing//easing.min.js"></script>
    <script src="..//lib//waypoints//waypoints.min.js"></script>
    <script src="..//lib/counterup//counterup.min.js"></script>
    <script src="..//lib//owlcarousel//owl.carousel.min.js"></script>
    <script src="..//lib/tempusdominus//js/moment.min.js"></script>
    <script src="..//lib//tempusdominus//js//moment-timezone.min.js"></script>
    <script src="..//lib//tempusdominus//js//tempusdominus-bootstrap-4.min.js"></script>

    <!-- jquery -->
    <script src="..//assets//js//jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="..//assets//bootstrap//js//bootstrap.min.js"></script>
    <!-- count down -->
    <script src="..//assets//js//jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="..//assets//js//jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="..//assets//js//waypoints.js"></script>
    <!-- owl carousel -->
    <script src="..//assets//js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="..//assets//js//jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="..//assets//js//jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="..//assets//js//sticker.js"></script>
    <!-- main js -->
    <script src="..//assets//js//main.js"></script>

    <!-- Template Javascript -->
    <script src="..//js//main.js"></script>
    <script src="..//js//giohang.js"></script>
    <script>
        document.querySelector('.search-bar-icon').addEventListener('click', function() {
            document.querySelector('.search-area').style.display = 'block';
        });

        document.querySelector('.close-btn').addEventListener('click', function() {
            document.querySelector('.search-area').style.display = 'none';
        });
        
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.getElementsByClassName("quantity-input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("change", function() {
            var max = this.getAttribute("max"); 
            var currentValue = this.value;
            if (parseInt(currentValue) > parseInt(max)) {
                this.value = max; 
            }
        });
    }
});
</script>
<script>
$(document).ready(function(){
    $('.quantity-input').on('change', function(event){
        event.preventDefault();
        var key = $(this).data('key');
        var quantity = $(this).val();
        var product = $(this).data('product');
        $.ajax({
            url: 'cart.php',
            method: 'POST',
            data: {
                key: key,
                quantity: quantity,
                product: product
            },
            success: function(response){
            }
        });
    });
});

</script>
<script>
function myFunction() {
    var input, filter, ul, li, h5, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    var found = false; 
    for (i = 0; i < li.length; i++) {
        h5 = li[i].getElementsByTagName("h5")[0];
        txtValue = h5.textContent || h5.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            found = true; 
        } else {
            li[i].style.display = "none";
        }
    }
    if (found === false) {
    var notFound = document.createElement("li");
    notFound.textContent = "Không tìm thấy sản phẩm";
    setTimeout(function () {
        notFound.remove();
    }, 5000);
    ul.appendChild(notFound);
}

}

    </script>



</body>

</html>