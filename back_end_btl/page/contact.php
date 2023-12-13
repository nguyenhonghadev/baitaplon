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
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><a href="../index.html"><i class="fa fa-utensils me-3"></i>HK Restaurant</a></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="../index.html " class="nav-item nav-link">Trang Chủ</a>
                        <a href="../about.html" class="nav-item nav-link ">Giới Thiệu </a>
                        <a href="contact.html" class="nav-item nav-link active">Liên Hệ</a>
                        <a href="../menu.html" class="nav-item nav-link">sản Phẩm</a>
                        <a href="Giohang.html" class="nav-item nav-link">
                            <i class="fa-solid fa-cart-shopping"> <span class="headerCartListCount">0</span></i>

                        </a>

                        <a href="login.html" class="nav-item nav-link" aria-label="login"><i class="fa-regular fa-user"></i></a>

                        <a class="mobile-hide search-bar-icon nav-item nav-link"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Liên Hệ CHúng Tôi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="../index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="../about.html">Liên Hệ</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Sản Phẩm</li>
                        </ol>
                    </nav>
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
                                    <button type="submit" class="search-button"><h4 style="padding-bottom: 1em;">Tìm Kiếm<i class="fas fa-search search-icon"></i></h4> </button>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact start -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="form-title">
                        <h2>Bạn Có Thắc Mắc Cần Giải Đáp?</h2>
                        <p>Hãy liên hệ với chúng tôi khi bạn có bất kì thắc mắc nào hay đồ ăn của chúng tôi khiến bạn không hài lòng bằng đường dây nóng hoặc bằng cách sau:</p>
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                    <form action="baitaplon/back_end_btl/page/contact.php" method="post" id="fruitkha-contact" > <p>
                                <input type="text" placeholder="Họ và Tên" required name="name" id="name">
                                <input type="email" placeholder="Email" required name="email" id="email">
                            </p>
                            <p>
                                <input type="tel" placeholder="Số điện thoại" required name="phone" id="phone">
                                <input type="text" placeholder="Vấn đề của bạn" name="subject" id="subject">
                            </p>
                            <p><textarea name="message" id="message" cols="30" rows="10" required placeholder="Chi tiết vấn đề của bạn" minlength="100"></textarea></p>
                            <input type="hidden" name="token" value="FsWga4&@f6aw" />
                            <p><input type="submit" value="Gửi"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-form-wrap">
                        <div class="contact-form-box">
                            <h4><i class="fas fa-map"></i>Địa Chỉ</h4>
                            <p>123 Phố Trần Duy Hưng <br>Hà Nội. <br>Việt Nam</p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="far fa-clock"></i>Giờ Hoạt Động</h4>
                            <p>Thứ Hai - Thứ Bảy:07 - 11pm<br> Chủ Nhật: 09 to 11.30 PM </p>
                        </div>
                        <div class="contact-form-box">
                            <h4><i class="fas fa-address-book"></i>Liên Hệ</h4>
                            <p>Đường dây nóng:0967851017 <br> Email: ManhKien203@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Nhà hàng</h4>
                    <a class="btn btn-link" href="../about.html">Về chúng tôi</a>
                    <a class="btn btn-link" href="contact.html">Liên Hệ</a>
                    <a class="btn btn-link" href="../menu.html">Mua hàng ngay</a>
                    <a class="btn btn-link" href="#">Chính sách bảo mật</a>
                    <a class="btn btn-link" href="#">Điều khoản & Điều kiện</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Liên Hệ</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Phố Trần Duy Hưng,Hà Nội,Việt Nam</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+84 967851017</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Manhkien203@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"> <i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Hoạt Động</h4>
                    <h5 class="text-light fw-normal">Thứ hai-Thứ Bảy</h5>
                    <p>07AM - 11PM</p>
                    <h5 class="text-light fw-normal">Chủ Nhật</h5>
                    <p>9AM - 11.30PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Gửi phản hồi tới chúng tôi</h4>
                    <p>Hãy gửi chúng tôi lời phản hồi của bạn</p>
                    <form action="">
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Phản hồi của bạn">
                            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="contact.html" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="back"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script>
        document.querySelector('.search-bar-icon').addEventListener('click', function() {
            document.querySelector('.search-area').style.display = 'block';
        });

        document.querySelector('.close-btn').addEventListener('click', function() {
            document.querySelector('.search-area').style.display = 'none';
        });
    </script>
<?php

// Kết nối cơ sở dữ liệu
require('../config/connect.php');


// Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$loinhan = $_POST['subject'];                                
$chitietloinhan = $_POST['message'];

// Thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO contact_info (name, email, phone, loinhan, chitietloinhan) VALUES ('$name', '$email', '$phone', '$loinhan', '$chitietloinhan')";

if (mysqli_query($conn, $sql)) {
  // Thành công
  echo "Gửi liên hệ thành công.";
} else {
  // Thất bại
  echo "Gửi liên hệ thất bại: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);

?>


</body>

</html>