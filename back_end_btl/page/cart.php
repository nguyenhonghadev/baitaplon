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
                                        echo '<tr class="table-body-row">';
                                        echo '<td class="product-rm"><a href="remove_product.php?key=' . $key . '"><i class="far fa-window-close"></i></a></td>';
                                        echo '<td class="product-image"><img src="' . $prd['image'] . '" alt="' . $prd['name'] . '"></td>';
                                        echo '<td class="product-name">' . $prd['name'] . '</td>';
                                        echo '<td class="product-price">' . $prd['price'] . '</td>';
                                        echo '<td class="product-quantity"><input type="number" placeholder="0" value="' . $prd['quantity'] . '"></td>';
                                        echo '<td class="product-total">' . $prd['quantity'] . '</td>';
                                        echo '</tr>';
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
                                                <th>Tổng Cộng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="total-data">
                                                <td><strong>Tổng tiền sản phẩm </strong></td>
                                                <td id="tong-gia"></td>
                                            </tr>
                                            <tr class="total-data">
                                                <td><strong>Vận chuyển </strong></td>
                                                <td>25000đ</td>
                                            </tr>
                                            <tr class="total-data">
                                                <td><strong>Tổng  </strong></td>
                                                <td id="Tong"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="cart-buttons">
                                        <a href="cart.php" class="boxed-btn">Làm Mới</a>
                                        <a href="ThanhToan.html" class="boxed-btn black">Thanh Toán</a>
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
    <!-- kểt thúc giỏ hàng -->
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
</body>

</html>