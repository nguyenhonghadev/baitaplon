
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>HK Restaurant -</title>
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
    <link href="..//lib/animate//animate.min.css" rel="stylesheet">
    <link href="..//lib/owlcarousel//assets//owl.carousel.min.css" rel="stylesheet">
    <link href="..//lib//tempusdominus//css//tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="..//css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="..//css//style.css" rel="stylesheet">
    <link rel="stylesheet" href="..//assets//css//main.css">
    <link rel="stylesheet" href="..//assets//css//responsive.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <?php
        include('../config/header1.php');
        ?>
    <!-- Navbar & Hero End -->

    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">Tất Cả</li>
                            <li data-filter=".food">Đồ Ăn </li>
                            <li data-filter=".drinking">Dồ Uống</li>
                            <li data-filter=".desert">Tráng Miệng</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
            <?php
require('../config/connect.php');
mysqli_set_charset($conn, 'utf8');
$sql = "SELECT * FROM products";
$ketqua = $conn->query($sql);

if ($ketqua->num_rows > 0) {
    while ($row = $ketqua->fetch_assoc()) {
        echo '<div class="col-lg-4 col-md-6 text-center">'; // Bỏ id và class không cần thiết ở đây
        if ($row['prd_category'] === 'Tráng Miệng') {
            echo '<script>
                $(document).ready(function(){
                    $(".col-lg-4").addClass("desert");
                });
                </script>';
        } elseif ($row['prd_category'] === 'Đồ uống') {
            echo '<script>
                $(document).ready(function(){
                    $(".col-lg-4").addClass("drinking");
                });
                </script>';
        } elseif($row['prd_category'] === 'Đồ ăn') {
            echo '<script>
                $(document).ready(function(){
                    $(".col-lg-4").addClass("food");
                });
                </script>';
        }

        echo '<div class="single-product-item">';
        echo '<span class="sale" id="saleSpan">NEW!</span>';
        echo '<script>
            setTimeout(function() {
                document.getElementById("saleSpan").style.display = "none";
            }, 3000000); 
        </script>';
        
        echo '<div class="product-image">';
        
        $path = '../admin/image/';
        $img = $row['prd_img'];
        $link = $path . '/' . $img;
        
        echo '<a href="product_detail.php?prd_id=' . $row['prd_id'] . '"><img src="' . $link . '" alt="' . $row["prd_name"] . '"></a>';
        echo '</div>';
        echo '<h3>' . $row["prd_name"] . '</h3>';
        echo '<div style="text-align: center; margin-bottom: 10px;">';
        echo '<div class="product-price name-product" style="display: inline-block; margin-right: 10px; font-family: \'Poppins\', sans-serif;font-size: 30px;font-weight: 700;">' . $row["prd_price"] . 'đ</div>';
        echo '</div>';
        echo '<p>Còn lại: ' . $row["prd_quantity"] . '</p>';
        echo '<button style="font-family: \'Poppins\', sans-serif;display: inline-block;background-color: #F28123;color: #fff;padding: 10px 20px;border: none;border-radius: 2em;" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ Hàng</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Không có sản phẩm nào.";
}
?>

               
            </div>

        </div>
    </div>


   <?php
   include('../config/footer.php')
   ?>


    <a href="product.php" class="btn btn-lg btn-primary btn-lg-square back-to-top " aria-label="quay lai"><i class="bi bi-arrow-up "></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js "></script>
    <script src="lib/wow/wow.min.js "></script>
    <script src="lib/easing/easing.min.js "></script>
    <script src="lib/waypoints/waypoints.min.js "></script>
    <script src="lib/counterup/counterup.min.js "></script>
    <script src="lib/owlcarousel/owl.carousel.min.js "></script>
    <script src="lib/tempusdominus/js/moment.min.js "></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js "></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js "></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Template Javascript -->
    <script src="..//js//main.js "></script>
    <!-- product -->
    <script src="..//assets/js//jquery-1.11.3.min.js "></script>
    <!-- bootstrap -->
    <script src="..//assets//bootstrap//js//bootstrap.min.js "></script>
    <!-- count down -->
    <script src="..//assets//js//jquery.countdown.js "></script>
    <!-- isotope -->
    <script src="..//assets//js//jquery.isotope-3.0.6.min.js "></script>
    <!-- waypoints -->
    <script src="..//assets//js//waypoints.js "></script>
    <!-- owl carousel -->
    <script src="..//assets//js/owl.carousel.min.js "></script>
    <!-- magnific popup -->
    <script src="..//assets//js/jquery.magnific-popup.min.js "></script>
    <!-- mean menu -->
    <script src="..//assets//js//jquery.meanmenu.min.js "></script>
    <!-- sticker js -->
    <script src="..//assets//js//sticker.js "></script>
    <!-- main js -->
    <script src="..//assets//js//main.js "></script>
    <script src="..//lib//waypoints//waypoints.min.js "></script>
    <script src="..//js//menu.js "></script>
    <script>
        $(document).ready(function() {
            $('.search-bar-icon').click(function() {
                $('.search-area').toggleClass('search-active');
            });

            $('.close-btn').click(function() {
                $('.search-area').removeClass('search-active');
            });
        });
    </script>

</body>


</html>