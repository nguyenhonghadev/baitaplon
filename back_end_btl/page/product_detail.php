<?php
session_start();
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
                    <form action="product_detail.php" method="POST">
                    <input type="number" name="quantity" min="1" value="1" >
                        <input type="hidden" name="product_id" value="<?php echo $_GET['prd_id']; ?>" /> 
                        <input type="submit"  class="add-to-cart-btn" data-product-id="<?php echo $row['prd_id']; ?>" style="font-family: 'Poppins', sans-serif; display: inline-block; background-color: #F28123; color: #fff; padding: 10px 20px; border: none; border-radius: 2em;" value="Thêm vào giỏ hàng">
                    </form>

                </div>
                <h4>Share:</h4>
                <ul class="product-share">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
        require('function.php');

        if (isset($_POST['product_id'])&&isset($_POST['quantity'])) {
            // Lấy ID sản phẩm từ form
            $prd_id = $_POST['product_id'];
            $quantity=$_POST['quantity'];
            // Kết nối CSDL
            require('../config/connect.php');
            mysqli_set_charset($conn, 'utf8');

            $sql = "SELECT prd_img, prd_name, prd_price FROM products WHERE prd_id='$prd_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Lấy thông tin sản phẩm từ CSDL
                    $prd_img = $row['prd_img'];
                    $prd_name = $row['prd_name'];
                    $prd_price = $row['prd_price'];
                    // $max_quantity=$row['prd_quantity'];
                    $path = '../admin/image/';
                    $prd_img_path = $path . $row['prd_img'];

                    // Tạo một mảng chứa thông tin sản phẩm từ CSDL
                    $product = array(
                        'name' => $prd_name,
                        'price' => $prd_price . 'đ', // Đảm bảo giá trị giá là chuỗi
                        'quantity' => $quantity,
                        'image' => $prd_img_path,
                        // 'max_quantity'=>$max_quantity,
                    );

                    // Thêm sản phẩm vào giỏ hàng của người dùng
                    addProductToCart($product);
                    echo"<script>window.location.href='cart.php'</script>";
                   
                }
            }
            $conn->close();
        } 
    ?>  
<?php
require('..//config//footer.php');
?>
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