   <?php
    session_start();
  ?>  
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><a href="index.php"><i class="fa fa-utensils me-3"></i>HK Restaurant</a></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link active">Trang Chủ</a>
                        <a href="about.php" class="nav-item nav-link">GIỚI THIỆU</a>
                        <a href="contact.php" class="nav-item nav-link">LIÊN HỆ</a>
                        <a href="product.php" class="nav-item nav-link">SẢN PHẨM</a>
                        <a href="../page/cart.php" class="nav-item nav-link">
    <i class="fa-solid fa-cart-shopping">
        <?php

        if (isset($_SESSION['username'])) {
            // Kiểm tra nếu đã đăng nhập, lấy số lượng sản phẩm từ giỏ hàng của người dùng
            $cartItemCount = isset($_SESSION['user_cart'][$_SESSION['username']]) ? count($_SESSION['user_cart'][$_SESSION['username']]) : 0;
            echo "<span class='headerCartListCount'>$cartItemCount</span>";
        } else {
            // Xử lý khi không có phiên đăng nhập, hiển thị số lượng sản phẩm từ giỏ hàng (nếu có)
            $cartItemCount = isset($_SESSION['guest_cart']) ? count($_SESSION['guest_cart']) : 0;
            echo "<span class='headerCartListCount'>$cartItemCount</span>";
        }
        ?>
    </i>
</a>



<?php
require('connect.php'); // Đảm bảo rằng bạn đã chỉ định đường dẫn chính xác đến tệp connect.php
if (isset($_SESSION["username"]) ) {
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    
    // Thay đổi phần in link dựa trên user đã đăng nhập hay chưa
    echo "<a href='info.php' class='nav-item nav-link'><i class='fa-regular fa-user'></i></a>";
}
} else {
    echo "<a href='../user/login.php' class='nav-item nav-link' aria-label='Đăng nhập'><i class='fa-regular fa-user'></i></a>";
}
mysqli_close($conn); // Đóng kết nối

?>




<a class="mobile-hide search-bar-icon nav-item nav-link" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </nav>


            <div class="container-kxxl py-5 bg-dark hero-header mb-5 ">
                <div class="container my-5 py-5 ">
                    <div class="row align-items-center g-5 ">
                        <div class="col-lg-6 text-center text-lg-start ">
                            <h1 class="display-3 text-white animated slideInLeft ">Thưởng thức <br>món ăn ngon của chúng tôi</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2 ">Trải nghiệm những món ăn ngon giàu dinh dưỡng đậm đà màu sắc ẩm thực Việt cùng ngàn ưu đãi </p>
                            <a href="menu.html " class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft " style="color:#000000;font-weight:bolder;">Đặt Hàng Ngay</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden ">
                            <img class="img-fluid " src="../image/hero.png" alt="avatar ">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                <input style="width: 60em;margin-left: 20%;" id="myInput" type="search" onkeyup="myFunction()" class="form-control bg-transparent p-3" placeholder="Nhập vào món ăn của bạn" aria-describedby="search-icon-1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    
                        <div style="position: absolute; left: 10%; top: 13%; display: flex; flex-wrap: wrap;">
                            <ul id="myUL" style="list-style: none; padding: 0; display: flex; flex-wrap: wrap;">
                            <?php
                                require('../config/connect.php');
                                mysqli_set_charset($conn, 'utf8');
                                $sql_header = "SELECT * FROM products";
                                $path_img = '../admin/image'; 
                                $kq_header = $conn->query($sql_header);
                                if ($kq_header->num_rows > 0) {
                                    while ($row = $kq_header->fetch_assoc()) {
                                        $img = $path_img . '/' . $row['prd_img'];
                                        echo '<li style="width: calc(45% - 10px); margin-bottom: 1em; margin-left: 1em; border-radius: 3em; min-width: 30em; background-color: #fff;">
                                        <a href="../page/product_detail.php?prd_id=' . $row["prd_id"] . '" style="text-decoration: none; color: inherit;">
                                            <div style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #ddd;">
                                                <img src="' . $img . '" style="width: 3em; height: 3em; border-radius: 50%; margin-right: 10px;">
                                                <div style="flex-grow: 1;">
                                                    <h5 style="margin: 0;">' . $row["prd_name"] . '</h5>
                                                    <p style="margin: 0;">' . $row["prd_price"] . '<span> >>>>>>>>>>>>>> </span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>';
                                
                                    }
                                }
                                    $conn->close();
                            ?>
                     </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
