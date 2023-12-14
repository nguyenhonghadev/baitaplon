<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>HK restaurant</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="..//lib//animate//animate.min.css" rel="stylesheet">
    <link href="..//lib/owlcarousel//assets//owl.carousel.min.css" rel="stylesheet">
    <link href="..//lib/tempusdominus//css//tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="..//css//bootstrap.min.css" rel="stylesheet">
<link href="..//css//info.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="..//css//style.css" rel="stylesheet">
</head>

<body>
<?php include("../config/header1.php"); 
echo"<script>
$(document).ready(function(){
    $('#user').addClass('active');
});
</script>";?>
    <div class="container-x1">
    <a style="margin-left: 90%;" href="../user/logout.php">
    <i class="fas fa-sign-out-alt"></i> Đăng xuất
  </a>
        <div class="info">
            <?php 
            
            if(isset($_SESSION['username']) ){
                require("../config/connect.php");
                $username= $_SESSION['username'];
    
                $sql = "SELECT username, numberphone FROM users WHERE username='$username'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="customer-details">';
                    echo "<h2>Khách hàng:".$row['username']."</h2>";
                    echo "<p>Phone:".$row['numberphone']."</p>";
                    echo "<p>Address:</p>";
                    echo '</div>';
                }
                elseif($username==='admin'){
                      echo '<div class="customer-details">';
                    echo "<h2>Bạn đang là :".$username."</h2>";
                }
                  
                }
            ?>
        <div class="thanh-phan">
            <div onclick="showSection('donduyet')">Đơn kiểm duyệt</div>
            <div onclick="showSection('don-ship')">Đơn đang giao</div>
            <div onclick="showSection('don-thanh-cong')">Đơn hoàn thành</div>
        </div>
        <div class="order">
            <section class="donduyet">
                <!-- Pending orders -->
                <h2>Đơn chờ duyệt</h2>
                <ul class="pending-orders">
                    <!-- List pending orders here -->
                    <li>Order #1</li>
                    <li>Order #2</li>
                    <!-- Add more pending orders -->
                </ul>
            </section>
            <section class="don-ship">
                <!-- Orders for shipment -->
                <h2>Đơn hàng đang giao</h2>
                <ul class="shipping-orders">
                    <!-- List orders for shipment here -->
                    <li>Order #3</li>
                    <li>Order #4</li>
                    <!-- Add more orders being shipped -->
                </ul>
            </section>
            <section class="don-thanh-cong">
                <!-- Successfully delivered orders -->
                <h2>Đơn hàng đã thành công</h2>
                <ul class="success-orders">
                    <!-- List successfully delivered orders here -->
                    <li>Order #5</li>
                    <li>Order #6</li>
                    <!-- Add more successfully delivered orders -->
                </ul>
            </section>
        </div>
    </div>
</div>
    <?php
    include('../config/footer.php');
    ?>

    
</body>
<script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.order section');
            sections.forEach(section => {
                if (section.classList.contains(sectionId)) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });
        }
    </script>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js "></script>
    <script src="../lib/wow/wow.min.js "></script>
    <script src="../lib/easing/easing.min.js "></script>
    <script src="../lib/waypoints/waypoints.min.js "></script>
    <script src="../lib/counterup/counterup.min.js "></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js "></script>
    <script src="../lib/tempusdominus/js/moment.min.js "></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js "></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js "></script>

    <!-- Template Javascript -->
    <script src="../js/main.js "></script>

</html>