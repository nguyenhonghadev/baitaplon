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
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

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
    <?php
        // include('../config/header1.php');
        // echo"<script>
        // $(document).ready(function(){
        //     $('#contact').addClass('active');
        // });
        // </script>";
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
    <form id="contactForm">
        <p>
            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;" type="text" placeholder="Họ và Tên" required name="name" id="name">
            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;" type="email" placeholder="Email" required name="email" id="email">
        </p>
        <p>
            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;" type="tel" placeholder="Số điện thoại" required name="numberphone" id="phone">
            <input style="width: 49%;padding: 15px;border: 1px solid #ddd;border-radius: 3px;"  type="text" placeholder="Vấn đề của bạn" maxlength="150" minlength="25" name="problem" id="subject">
        </p>
        <p><textarea style="border: 1px solid #ddd;padding: 15px;height: 200px;border-radius: 3px;width: 100%;resize: none;" name="message" id="detail" cols="30" rows="10" required placeholder="Chi tiết vấn đề của bạn" minlength="100"></textarea></p>
        <p><input type="submit" value="Gửi"></p>
    </form>
    <?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['numberphone']) && isset($_POST['problem']) && isset($_POST['message'])){
    $id = substr(uniqid(), 0, 5);
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
        } else {
            echo "<script>alert('Đã xảy ra lỗi, vui lòng thử lại.')</script>";
        }
    }
    $stmt->close();
    $conn->close();
}
?>


    <script>
        $(document).ready(function(){
            $('#contactForm').submit(function(e){
                e.preventDefault(); // Ngăn chặn việc gửi form một cách thông thường
                
                // Lấy dữ liệu từ form
                var formData = $(this).serialize();
                
                // Gửi dữ liệu bằng Ajax
                $.ajax({
                    type: 'POST',
                    url: 'about.php', // Đường dẫn tới tập tin xử lý PHP
                    data: formData,
                    success: function(response){
                       
                    }
                });
            });
        });
    </script>
</body>
<script src="..//js//main.js"></script>
</html>
