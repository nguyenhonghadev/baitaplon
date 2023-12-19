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
    <link rel="stylesheet" href="../assets/css/info.css">
    <link href="..//css//bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/info.css">
    <link href="..//css//style.css" rel="stylesheet">
    <!-- <style>
            .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }
    
    .dropdown-content a {
        display: block;
        padding: 12px 16px;
        text-decoration: none;
        color: #333;
    }
    
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
    /* Hiển thị danh sách khi được bấm */
    
    .show {
        display: block;
    }
    
    .billing-address-form {
        padding: 2em;
        box-sizing: border-box;
        background-color: #fff;
        font-family: "Open Sans", sans-serif;
        border: 1px solid black;
        text-align: center;
        max-width: 1200px;
        height: auto;
        border-radius: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    #name,
    #phone,
    #address,
    #oldpassword,
    #newpassword {
        width: 25em;
        height: 3em;
    }
    
    .change-password {
        padding: 2em;
        box-sizing: border-box;
        background-color: #fff;
        font-family: "Open Sans", sans-serif;
        border: 1px solid black;
        text-align: center;
        max-width: 1200px;
        height: auto;
        border-radius: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
          
        .accept_order {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .don-ok {
            display: flex;
            align-items: center;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            height: 8em;
        }
        
        .don-ok img {
            max-width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
        
        .order_details {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            /* Tránh tràn chữ ra ngoài */
        }
        
        .order_details h6 {
            color: #333;
            font-size: 16px;
            margin-bottom: 5px;
            text-align: left;
            white-space: nowrap;
            /* Ngăn chữ bị tràn ra khỏi khung */
            overflow: hidden;
            /* Ẩn phần chữ tràn */
            text-overflow: ellipsis;
            /* Hiển thị dấu ... nếu chữ tràn */
        }
        
        .order_details p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            white-space: nowrap;
            /* Ngăn chữ bị tràn ra khỏi khung */
            overflow: hidden;
            /* Ẩn phần chữ tràn */
            text-overflow: ellipsis;
            /* Hiển thị dấu ... nếu chữ tràn */
        }
        
        .details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .order_details .details p {
            color: #666;
            font-size: 14px;
            margin: 5px 0;
        }
        
        .order_details .time {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .order_details .details .price {
            flex: 0 0 30%;
        }
        
        .order_details .details .quantity {
            flex: 0 0 20%;
        }
        
        .order_details .details .total {
            flex: 0 0 40%;
        }
        
        .order_details .time {
            margin-top: 10px;
        }
    </style> -->
    
</head>

<body>
<?php include("../config/header1.php"); 
echo"<script>
$(document).ready(function(){
    $('#user').addClass('active');
});
</script>";?>
    <div class="container-x1">
        <div class="editer">
            <div class="dropdown">
                <button style="border: none;background-color: #fff;width:3em;height:3em;" onclick="toggleDropdown()">
                    <i class='far fa-edit' style='font-size:1em'></i>
                </button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="../user/changepw.php" >Đổi mật khẩu</a>
                    <a href="../user/updateaddr.php">Cập nhật địa chỉ</a>
                </div>
            </div>
          
        </div>
    <a style="margin-left: 90%;" href="../user/logout.php">
    <i class="fas fa-sign-out-alt"></i> Đăng xuất
  </a>
        <div class="info">
            <?php 
            
            if(isset($_SESSION['username']) ){
                require("../config/connect.php");
                $username= $_SESSION['username'];
    
                $sql = "SELECT username, numberphone,address FROM users WHERE username='$username'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="customer-details">';
                    echo "<h2>Khách hàng:".$row['username']."</h2>";
                    echo "<p>Phone:".$row['numberphone']."</p>";
                    echo "<p>Address:".$row['address']."</p>";
                    echo '</div>';
                }
                elseif($username==='admin'){
                      echo '<div class="customer-details">';
                    echo "<h2>Bạn đang là :".$username."</h2>";
                }
                  
                }
            ?>
        <div class="thanh-phan">
             <div onclick="showSection('donmoi')">Chờ xác nhận</div> 
            <div onclick="showSection('donduyet')">Chờ lấy hàng</div>
            <div onclick="showSection('don-ship')">Chờ giao hàng</div>
            <div onclick="showSection('don-thanh-cong')">Đơn hoàn thành</div>
        </div>
        <div class="order">
            <section class="donmoi">
                <h2>Chờ xác nhận</h2>
                <ul class="accept_order">
                    <li>
                    <div class="don-ok">
                            <img src="../image/tráng miệng/cam.jpg" alt="Tên sản phẩm">
                            <div class="order_details">
                                <div class="order_details">
                                    <h6 class="product">Tên sản phẩm</h6>
                                    <div class="details">
                                        <p class="price">Giá: 200000đ</p>
                                        <p class="quantity">x1</p>
                                        <p class="total">Thành tiền:200000đ</p>
                                    </div>
                                    <p class="time">Thời gian</p><button style="border: none;width: 3em;margin-left: 80%;"><a href="#">Hủy</a></button>
                                </div>
                            </div>
                        </div>
                </li>
            </ul>
            </section>
            <section class="donduyet">
                <h2>Chờ lấy hàng</h2>
                <ul class="pending-orders">
                <div class="form_order" ></div>
                    <li>Order #2</li>
                </ul>
            </section>
            <section class="don-ship">
                <h2>Chờ giao hàng</h2>
                <ul class="shipping-orders">
                <div class="form_order" ></div>
                    <li>Order #4</li>
                </ul>
            </section>
            <section class="don-thanh-cong">
                <h2>Đơn hoàn thành</h2>
                <ul class="success-orders">
                <div class="form_order" ></div>
                    <li>Order #6</li>
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
     <script>
        // JavaScript
        function toggleDropdown() {
            var dropdown = document.getElementById("myDropdown");
            dropdown.classList.toggle("show");
        }

        // Đóng danh sách khi bấm ra ngoài
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown button')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
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