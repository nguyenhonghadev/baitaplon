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
    <link href="..//lib//owlcarousel//assets/owl.carousel.min.css" rel="stylesheet">
    <link href="..//lib//tempusdominus//css//tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="..//css//bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="..//css//style.css" rel="stylesheet">
    <link rel="stylesheet" href="..//assets//css/main.css">
    <link rel="stylesheet" href="..//assets//css//responsive.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
       <?php
       include('..//config//header1.php')
       ?>
    <!-- nav end -->

    <!-- chi tiet san pham -->
    <div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <?php   
                require('../config/connect.php');
                mysqli_set_charset($conn,'utf8');
                if(isset($_GET['prd_id']) || (!empty($_GET['prd_id']))) {
                    $prd_id = $_GET['prd_id'];
                    $sql = "SELECT * FROM products WHERE prd_id ='$prd_id'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $path = '../admin/image/';
                        $img = $row['prd_img'];
                        $link = $path . '/' . $img;
                        ?>
                        <div class="single-product-img">
                            <img src="<?php echo $link; ?>" alt="<?php echo $row['prd_name']; ?>">
                        </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3><?php echo $row['prd_name']; ?></h3>
                    <div style="margin-bottom: 10px;">
                        <div class="product-price name-product" style="display: inline-block; margin-right: 10px; font-family: 'Poppins', sans-serif; font-size: 30px; font-weight: 700;">
                            <?php echo $row['prd_price'] . 'đ'; ?>
                        </div>
                    </div>
                    <p><?php echo $row['prd_detail']; ?></p>
                </div>
                <?php } ?>
                <div class="single-product-form">
                    <form action="../menu.html">
                        <input type="number" placeholder="0">
                    </form>
                    <a href="Giohang.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                </div>
                <h4>Share:</h4>
                <ul class="product-share">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

    <!-- footer -->
    
<?php
require('..//config//footer.php');
?>

    <!-- Back to Top -->
    <?php
    echo '<a href="product_detail.php?prd_id=' . $_GET['prd_id'] . '" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="BACK"><i class="bi bi-arrow-up"></i></a>';
?>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="..//lib//wow//wow.min.js"></script>
    <script src="..//lib//easing//easing.min.js"></script>
    <script src="..//lib//waypoints//waypoints.min.js"></script>
    <script src="..//lib//counterup//counterup.min.js"></script>
    <script src="..//lib/owlcarousel//owl.carousel.min.js"></script>
    <script src="..//lib/tempusdominus//js//moment.min.js"></script>
    <script src="..//lib/tempusdominus//js/moment-timezone.min.js"></script>
    <script src="..//lib//tempusdominus//js//tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="..//js//main.js"></script>
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