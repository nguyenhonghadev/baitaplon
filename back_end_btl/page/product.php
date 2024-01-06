<?php
session_start();
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <?php
        include('../config/header1.php');
        echo"<script>
        $(document).ready(function(){
            $('#product').addClass('active');
        });
        </script>";
        ?>
<div class="notification-container" style="    display: none;
    position:fixed;
    top:30%;
    right: 35%;
    padding: 3em 4em;
    background-color: red;
    color: white;
    border-radius: 5px;
    z-index: 1000;"></div>

    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">Tất Cả</li>
                            <li data-filter=".food">Đồ Ăn </li>
                            <li data-filter=".drinking">Đồ Uống</li>
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
    if ($ketqua->num_rows > 0) {
        $rows = $ketqua->fetch_all(MYSQLI_ASSOC);
    
        foreach ($rows as $row) {
            echo '<div class="col-lg-4 col-md-6 text-center ';
            if ($row['prd_category'] === 'Tráng miệng') {
                echo 'desert';
            } elseif ($row['prd_category'] === 'Đồ uống') {
                echo 'drinking';
            } elseif ($row['prd_category'] === 'Đồ ăn') {
                echo 'food';
            }
            echo '">';
    
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
            echo '<div class="product-price name-product" style="display: inline-block; margin-right: 10px; font-family: \'Poppins\', sans-serif;font-size: 30px;font-weight: 700;">' . number_format($row["prd_price"], 0, ',', '.') . 'đ</div>';
            echo '</div>';
                if($row["prd_quantity"]>0){
                    echo '<p>Còn lại: ' . $row["prd_quantity"] . '</p>';
                    echo '<form method="POST" >';
                    echo '<input type="hidden" name="product_id" value="' . $row['prd_id'] . '">';
                    echo '<button type="submit" data-product-id="' . $row['prd_id'] . '" name="add_to_cart" class="add-to-cart-btn" style="font-family: \'Poppins\', sans-serif;display: inline-block;background-color: #F28123;color: #fff;padding: 10px 20px;border: none;border-radius: 2em;">';
                    echo '<i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng';
                    echo '</button>';
                             
                    echo '</form>';
                }
                else{
                    echo '<p>HẾT HÀNG</p>';
                      echo '<form method="POST" >';
                    echo '<input type="hidden" name="product_id" value="' . $row['prd_id'] . '">';
                    echo '<button type="button"  data-product-id="' . $row['prd_id'] . '" style="font-family: \'Poppins\', sans-serif;display: inline-block;background-color: #F28123;color: #fff;padding: 10px 20px;border: none;border-radius: 2em;">';
                    echo '<i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng';
                    echo '</button>';            
                    echo '</form>';
                }
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Không có sản phẩm nào.";
    }
}
$conn->close();    
    ?>


               
            </div>

        </div>
    </div>
        <?php
        require('function.php');

        if (isset($_POST['product_id'])) {
            // Lấy ID sản phẩm từ form
            $prd_id = $_POST['product_id'];

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
                    $max_quantity=$row['prd_quantity'];
                    $path = '../admin/image/';
                    $prd_img_path = $path . $row['prd_img'];

                    $product = array(
                        'name' => $prd_name,
                        'price' => $prd_price . 'đ', 
                        'quantity' => 1,
                        'image' => $prd_img_path,
                        'max_quantity'=>$max_quantity,
                    );
                    addProductToCart($product);
                   
                }
            }
            $conn->close();
           
        } 
       
    ?>


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

    <!-- Template Javascript -->
    <script src="js/main.js "></script>
    <!-- product -->
    <script src="assets/js/jquery-1.11.3.min.js "></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js "></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js "></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js "></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js "></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js "></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js "></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js "></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js "></script>
    <!-- main js -->
    <script src="assets/js/main.js "></script>
    <script src="lib/waypoints/waypoints.min.js "></script>
    <script>
$(document).ready(function() {
    $('.add-to-cart-btn').click(function(e) {
        e.preventDefault();
        var productID = $(this).data('product-id');
        $.ajax({
            type: 'POST',
            url: 'product.php', 
            data: { product_id: productID },
            success: function(response) {
                $('.notification-container').text('Sản phẩm đã được thêm vào giỏ hàng!!!!'); 
                $('.notification-container').fadeIn().delay(2000).fadeOut(); 
            },
            error: function() {
                var errorNotification = $('.error-notification');
                errorNotification.text('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
                errorNotification.fadeIn().delay(2000).fadeOut();
            }
        });
    });
});

</script> 

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