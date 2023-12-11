<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "<script>window.location.href = 'loginadmin.php';</script>";
    exit();
}



?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin -HK restaurant</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link rel="stylesheet"href="..//css//admin.css">

</head>

<body>
    <header>
    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>HK Restaurant</h1>
    </header>

    <!-- Menu -->
    <aside class="sidebar">
    <ul class="nav">
    <li class="nav-title">MENU</li>
    <li class="nav-item"><a href="admin.php?quanly=main" class="nav-link" id='tp1'><i class="fa fa-home"></i> Trang Chủ</a></li>
    <li class="nav-item"><a href="admin.php?quanly=product" class="nav-link" id='tp2'><i class="fa fa-th-large"></i> Sản Phẩm</a></li>
    <li class="nav-item"><a href="admin.php?quanly=donhang" class="nav-link" id='tp3'><i class="fa fa-file-text-o"></i> Đơn Hàng</a></li>
    <li class="nav-item"><a href="admin.php?quanly=user" class="nav-link" id='tp4'><i class="fa fa-address-book-o"></i> Khách Hàng</a></li>
    <li class="nav-item"><a href="admin.php?quanly=spnb" class="nav-link" id='tp5'><i class="fa fa-star"></i> Sản Phẩm Nổi Bật</a></li>
    <li class="nav-item"><hr></li>
    <li class="nav-item">
        <a href="logout.php" class="nav-link">
            <i class="fa fa-arrow-left"></i> Đăng xuất (về Trang chủ)
        </a>
    </li>
</ul>

    </aside>

    <!-- Khung hiển thị chính -->
    <div class="main">
<?php
        if(isset($_GET['quanly'])){
            $temp=$_GET['quanly'];
            if($temp==="spnb"){
                echo"<script>
                $(document).ready(function(){
                    $('#tp5').addClass('active');
                });
                </script>";
                include('spnb.php');                
            }
            else if($temp==="product"){
                echo"<script>
                $(document).ready(function(){
                    $('#tp2').addClass('active');
                });
                </script>";
                include('product.php');
            }
            else if($temp==="user"){
                echo"<script>
                $(document).ready(function(){
                    $('#tp4').addClass('active');
                });
                </script>";
                include('user.php');
            }
            else if($temp==="donhang") {
                echo"<script>
                $(document).ready(function(){
                    $('#tp3').addClass('active');
                });
                </script>";
                include('donhang.php');
            }
            else{
                echo"<script>
                $(document).ready(function(){
                    $('#tp1').addClass('active');
                });
                </script>";
                include('main.php');
            }
        }
?>
</div>
        <footer>

        </footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('.main > div');

        // Hàm ẩn tất cả các phần tử
        function hideAllSections() {
            sections.forEach(section => {
                section.style.display = 'none';
            });
        }

        // Hàm xử lý khi nhấn vào các mục menu
        navLinks.forEach((link, index) => {
            link.addEventListener('click', function() {
                // Ẩn tất cả các phần tử
                hideAllSections();

                // Xóa lớp 'active' khỏi tất cả các mục menu
                navLinks.forEach(link => {
      
                });

                // Thêm lớp 'active' cho mục được nhấn
    

                // Hiển thị phần tử tương ứng với mục menu được nhấn
                sections[index].style.display = 'block';
            });
        });

        // Hiển thị trang chủ mặc định khi tải trang
        sections[0].style.display = 'block';

    });
    function showForm() {
  document.getElementById('update_prd').style.display='block';
}
</script>


</html>