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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link rel="stylesheet"href="..//css//admin.css">
    <style>
        
        
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            z-index: 1000000;
            margin-left: 3em;
            display: none;
            /* margin-top: -12em; */
        }
        
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type="file"] {
            display: none;
            /* Ẩn trường chọn file mặc định */
        }
        
        .image-inputs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .image-upload {
            position: relative;
            width: calc(33.33% - 10px);
            margin-bottom: 10px;
            text-align: center;
        }
        
        .image-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
        }
        
        .image-label {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }
        
        .image-label i {
            margin-right: 8px;
        }
        
        input[type="submit"] {
            width: 100%;
            background-color: #F28123;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        input[type="submit"]:hover {
            background-color: red;
        }
   
    </style>

</head>

<body>
    <header>
        <div class="header-container"> 
        <h3><a href="../page/index.php"><i class="fa fa-place-of-worship"></i><<<<<<< Home</a></h3>

            <h1 class="restaurant-title">HK Restaurant</h1>
        
            <?php
    require('../config/connect.php');

    // Get the count of emails
    $sqlCount = "SELECT COUNT(*) AS total FROM contacts";
    $resultCount = $conn->query($sqlCount);
    $rowCount = $resultCount->fetch_assoc()['total'];

    echo '<div class="icon-container">';
    echo '<button id="notificationButton" style="background-color: #F28123; border: none;">';
    echo '<i style="color: blue; font-size: 2em;" class="material-icons">notifications</i>';
    echo '<span class="headerCartListCount">' . $rowCount . '</span>';
    echo '</button>';

    echo '<div class="notificationList">';
    
    $sql = "SELECT * FROM contacts ORDER BY ct_time DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="message-container">
            <div class="message">
                <a style="color:red; font-size:1em; margin-left:90%" href="mode.php?contact='.$row['ct_id'].'"><i style="color:red" class="fa fa-trash-o"></i></a>
                <a href="contact.php?id='.$row['ct_id'].'">
                    <div class="sender">'.$row['ct_name'].'</div>
                    <div class="timestamp">'.$row['ct_time'].'</div>
                    <div class="content">
                        Tôi có điều muốn phản hồi với bạn!!!!
                    </div>
                </a>
            </div>
        </div>';

        }
    } else {
        echo '<div class="notification"><p>Không có thông báo mới!!!</p></div>';
        $conn->close();
    }
    


?>

        </div>
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
    <li class="nav-item"><a href="admin.php?quanly=baiviet" class="nav-link" id='tp6'><i class="fa fa-book"></i>Bài viết</a></li>
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
            else if($temp==="baiviet") {
                echo"<script>
                $(document).ready(function(){
                    $('#tp6').addClass('active');
                });
                </script>";
                include('about.php');
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
        else{
            echo"<script>
            $(document).ready(function(){
                $('#tp1').addClass('active');
            });
            </script>";
            include('main.php');
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
document.getElementById('notificationButton').addEventListener('click', function() {
        // Toggle class 'active' để hiển thị hoặc ẩn danh sách thông báo
        document.querySelector('.notificationList').classList.toggle('active');
    });
    // Lắng nghe sự kiện click trên mỗi hàng trong bảng thông báo
    document.querySelectorAll('.notificationList table tr').forEach(function(row, index) {
    // Bỏ qua hàng đầu tiên là tiêu đề
    if (index !== 0) {
        row.addEventListener('click', function(event) {
            // Ngăn chặn sự kiện click từ lan truyền đến checkbox
            event.stopPropagation();
            // Lấy checkbox trong hàng thông báo
            const checkbox = row.querySelector('input[type="checkbox"]');
            // Toggle trạng thái checked của checkbox khi nhấn vào hàng thông báo
            checkbox.checked = !checkbox.checked;
            // Lấy nội dung thông báo từ cell thứ 2 (index 1)
            const message = row.children[0].textContent; // Lấy nội dung từ cell đầu tiên (index 0) của hàng
            // Hiển thị thông báo chi tiết
            alert(message);
        });
    }
});

</script>
<script>
    function toggleContainer() {
        var containers = document.getElementsByClassName('container');
        for (var i = 0; i < containers.length; i++) {
            var container = containers[i];
            if (container.style.display === 'none' || container.style.display === '') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        }
    }
</script>
<script>
    function hideContainer() {
        var containers = document.getElementsByClassName('container');
        for (var i = 0; i < containers.length; i++) {
            containers[i].style.display = 'none';
        }
    }
</script>
<script>
    function displayMessage(inputId, inputElement) {
        const messageElement = document.getElementById(inputId + '-message');
        const file = inputElement.files[0];

        if (file) {
            const fileSize = file.size / 1024;
            if (fileSize > 1024) {
                messageElement.innerText = 'Kích thước file vượt quá giới hạn cho phép.';
                messageElement.style.display = 'block';
                inputElement.value = '';
            } else {
                messageElement.innerText = 'File đã chọn: ' + file.name;
                messageElement.style.display = 'block';
            }
        }
    }
</script>
</html>