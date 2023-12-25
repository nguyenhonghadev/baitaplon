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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="..//css//bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="..//css//style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="..//assets//css//responsive.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
    <?php
        require('../config/header1.php');
        echo"<script>
        $(document).ready(function(){
            $('#contact').addClass('active');
        });
        </script>";
        ?>
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
                    <form method="post" action="contact.php">
                        <p>
                            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;" type="text" placeholder="Họ và Tên" required name="name" id="name">
                            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;" type="email" placeholder="Email" required name="email" id="email">
                        </p>
                        <p>
                            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;" type="tel" placeholder="Số điện thoại" required name="numberphone" id="phone">
                            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;"  type="text" placeholder="Vấn đề của bạn" maxlength="150" minlength="25" name="problem" id="subject">
                        </p>
                        <p><textarea style="border: 1px solid #ddd;padding: 15px;height: 200px;border-radius: 3px;width: 100%;resize: none;" name="message" id="detail" cols="30" rows="10" required placeholder="Chi tiết vấn đề của bạn" minlength="100"></textarea></p>
                        <?php
                        if(isset($_SESSION['username'])){
                          echo'  <p><input type="submit" value="Gửi"></p>';
                        }
                        else
                        {
                            echo"Bạn chưa đăng nhập";
                        }
                        ?>
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
    <?php
    require('function.php');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['numberphone']) && isset($_POST['problem']) && isset($_POST['message'])){
    $id = generateRandomString();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $numberphone = $_POST['numberphone'];
    $problem = $_POST['problem'];
    $detail = $_POST['message'];

    require('../config/connect.php');
    mysqli_set_charset($conn, 'utf8');

    $stmt = $conn->prepare("SELECT * FROM contacts WHERE ct_id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        echo "<script>alert('Đã xảy ra lỗi, vui lòng thử lại.')</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO contacts(ct_id, ct_name, ct_email, ct_numberphone, ct_problem, ct_detail) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $id, $name, $email, $numberphone, $problem, $detail);
        
        if($stmt->execute()){
            echo "<script>alert('Đã gửi phản hồi thành công.')</script>"; 
            echo "<script>window.location.href = 'contact.php';</script>";
             exit();
        } else {
            echo "<script>alert('Đã xảy ra lỗi, vui lòng thử lại.')</script>";
        }
    }
    $stmt->close();
    $conn->close();
}
?>
    <!-- Footer Start -->
   <?php
   require('../config/footer.php')
   ?>
    <!-- Back to Top -->
    <a href="contact.html" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="back"><i class="bi bi-arrow-up"></i></a>
    </div>

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