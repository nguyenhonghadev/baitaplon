   <?php
    session_start();
  ?>  
     <form action="header.php" method="post">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="#" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><a href="index.html"><i class="fa fa-utensils me-3"></i>HK Restaurant</a></h1>
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




                        <a class="mobile-hide search-bar-icon nav-item nav-link"><i class="fas fa-search"></i></a>
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
        <div class="search-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="close-btn"><i class="fas fa-window-close"></i></span>
                        <div class="search-bar">
                            <div class="search-bar-tablecell">
                                <h3>Tìm Kiếm Món Ăn Của Bạn:</h3>
                                <input type="text" placeholder="Từ Khóa">
                                <button style="display: flex;margin:0 auto;" type="submit" class="search-button"><h4 style="padding-bottom: 1.5em;">Tìm Kiếm<i class="fas fa-search search-icon"></i></h4> </button> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>