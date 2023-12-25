<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>HK Restaurant </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
    <?php
        require('../config/header1.php');
        echo"<script>
        $(document).ready(function(){
            $('#about').addClass('active');
        });
        </script>";
        ?>
        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="../image/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="../image/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="../image/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="../image/about.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Về chúng tôi</h5>
                        <h1 class="mb-4">Chào mừng tới <i class="fa fa-utensils text-primary me-2"></i>HK restaurant</h1>
                        <p class="mb-4">Chào mừng đến với Hk Restaurant, nơi bạn có thể tìm thấy mọi loại món ăn ngon và đặt hàng trực tuyến một cách dễ dàng và thuận tiện. Chúng tôi tự hào là một nhà hàng đặt đồ ăn online, mang đến cho khách hàng những bữa ăn chất lượng
                            và dịch vụ tốt nhất</p>
                        <p class="mb-4">Chúng tôi rất mong được phục vụ và làm hài lòng khách hàng. Hãy thử đặt món ăn tại Hk Restaurant ngay hôm nay và trải nghiệm sự tiện lợi và ngon miệng của dịch vụ đặt đồ ăn online của chúng tôi. Xin cảm ơn!</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Năm</p>
                                        <h6 class="text-uppercase mb-0">Kinh Nghiệm</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">20</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Nổi tiếng</p>
                                        <h6 class="text-uppercase mb-0">Đầu bếp</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Thành Viên Cửa Hàng</h5>
                    <h1 class="mb-5">Các Bậc Thầy Đầu Bếp Của Chúng Tôi</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="../image/team-1.jpg" alt="Nguyễn Văn A">
                            </div>
                            <h5 class="mb-0">Chu Thế Toàn</h5>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="../image//team-2.jpg" alt="Nguyễn Văn B">
                            </div>
                            <h5 class="mb-0">Nguyễn Hồng Hà </h5>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="../image//team-3.jpg" alt="Lê Thế Chung">
                            </div>
                            <h5 class="mb-0">Lê Thế Chung</h5>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden">
                            <div class="rounded-circle overflow-hidden m-4">
                                <img class="img-fluid" src="../image/team-4.jpg" alt="Luka Bùi">
                            </div>
                            <h5 class="mb-0">Luke Bùi</h5>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

        <?php
        include('../config/footer.php')
        ?>

        <!-- Back to Top -->
        <a href="about.html" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="quay lại"><i class="bi bi-arrow-up"></i></a>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js "></script>
    <script src="..//lib/wow//wow.min.js "></script>
    <script src="..//lib/easing//easing.min.js "></script>
    <script src="..//lib/waypoints//waypoints.min.js "></script>
    <script src="..//lib/counterup/counterup.min.js "></script>
    <script src="..//lib/owlcarousel//owl.carousel.min.js "></script>
    <script src="..//lib/tempusdominus/js//moment.min.js "></script>
    <script src="..//lib/tempusdominus//js//moment-timezone.min.js "></script>
    <script src="..//lib/tempusdominus/js//tempusdominus-bootstrap-4.min.js "></script>

    <!-- Template Javascript -->
    <script src="..//js//main.js "></script>
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



