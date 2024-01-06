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
    <link href="..//css//bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="..//css//style.css" rel="stylesheet">
    <link href="../css/info.css" rel="stylesheet">

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
            <div onclick="showSection('don-huy')">Đơn đã hủy</div>
        </div>
        <div class="order">
        <section class="donmoi">
                <h2>Chờ xác nhận</h2>
                <ul class="accept_order">
                    <?php
                        $userorder = $_SESSION['username'];
                        require('../config/connect.php');
                        mysqli_set_charset($conn, 'utf8');
                        $user_curtainly=$_SESSION['username'];
                       
                        $sqlnew = "SELECT orders.order_id, orders.oder_prd, orders.order_date, orders.oder_quantity, orders.order_total, products.prd_img, products.prd_price, products.prd_id
                        FROM orders
                        JOIN products ON orders.oder_prd = products.prd_name
                        WHERE orders.oder_username = '$user_curtainly' AND orders.trang_thai = 'Đơn mới'
                        ORDER BY orders.order_date DESC";
                      $resultnew = $conn->query($sqlnew);
                      if ($resultnew->num_rows > 0) {
                          while($row_new = $resultnew->fetch_assoc()) {
                              echo " <li>
                              <div class='don-ok'>";
                              $path_img = '../admin/image';
                              $prd_img_new=$path_img .'/' . $row_new['prd_img'];
                              echo "<img src='" . $prd_img_new. "' alt='ảnh'>";
                             echo'<div class="order_details">
                                 <h6 class="product">'.$row_new["oder_prd"].'</h6>';
                                 echo '<div class="details">
                                 <p class="price">Giá: ' . $row_new["prd_price"] . '</p>';                             
                                 echo'<p class="quantity">'.$row_new["oder_quantity"].'</p>';
                                 echo'<p class="total">Thành tiền:'.$row_new["order_total"].'đ</p>';
                                 echo' </div>
                                 <p class="time">'.$row_new["order_date"].'</p><button id="cancelOrderBtn" data-order-id="'.$row_new['order_id'].'" style="border: none;width: 3em;margin-left: 80%;color:red;background-color:#fff">Hủy</button>
                             </div>
                         </div>  </li>';
                          }
                      }  
                        else{
                            echo"<h3>Không có đơn hàng nào!!!<a href='product.php'>Mua ngay</a></h3>";
                        }   
                        $conn->close();      
                        ?>
            </ul>
            </section>
            <section class="donduyet">
                <h2>Chờ lấy hàng</h2>
                <ul class="pending-orders">
                <div class="form_order" ></div>
                    <li><?php
                        $userorder = $_SESSION['username'];
                        require('../config/connect.php');
                        mysqli_set_charset($conn, 'utf8');
                        $sqlnew = "SELECT orders.order_id, orders.oder_prd, orders.order_date, orders.oder_quantity, orders.order_total, products.prd_img, products.prd_price, products.prd_id
                                   FROM orders
                                   JOIN products ON orders.oder_prd = products.prd_name
                                   WHERE orders.oder_username = '$user_curtainly' AND orders.trang_thai = 'Đã duyệt'
                                   ORDER BY orders.order_date DESC";
                      $resultnew = $conn->query($sqlnew);
                      if ($resultnew->num_rows > 0) {
                          while($row_new = $resultnew->fetch_assoc()) {
                              echo "<div class='don-ok'>";
                              $path_img = '../admin/image';
                              $prd_img_new=$path_img .'/' . $row_new['prd_img'];
                              echo "<img src='" . $prd_img_new. "' alt='ảnh'>";
                             echo'<div class="order_details">
                             <div class="order_details">
                                 <h6 class="product">'.$row_new["oder_prd"].'</h6>';
                                 echo '<div class="details">
                                 <p class="price">Giá: ' . $row_new["prd_price"] . '</p>';                             
                                 echo'<p class="quantity">'.$row_new["oder_quantity"].'</p>';
                                 echo'<p class="total">Thành tiền:'.$row_new["order_total"].'đ</p>';
                                 echo' </div>
                                 <p class="time">'.$row_new["order_date"].'</p><button id="cancelOrderBtn" data-order-id="'.$row_new['order_id'].'" style="border: none;width: 3em;margin-left: 80%;color:red;background-color:#fff"">Hủy</button>
                             </div>
                         </div>
                     </div>';
                          }
                      }             
                        else{
                            echo"<h3>Không có đơn hàng nào!!!<a href='product.php'>Mua ngay</a></h3>";
                        } 
                        $conn->close();          
                        ?>
                        </li>
                </ul>
            </section>
            <section class="don-ship">
                <h2>Chờ giao hàng</h2>
                <ul class="shipping-orders">
                <div class="form_order" ></div>
                    <li>
                        <?php
                        $userorder = $_SESSION['username'];
                        require('../config/connect.php');
                        mysqli_set_charset($conn, 'utf8');
                        $sqlnew = "SELECT orders.order_id, orders.oder_prd, orders.order_date, orders.oder_quantity, orders.order_total, products.prd_img, products.prd_price, products.prd_id
                                   FROM orders
                                   JOIN products ON orders.oder_prd = products.prd_name
                                   WHERE orders.oder_username = '$user_curtainly' AND orders.trang_thai = 'Đang vận chuyển'
                                   ORDER BY orders.order_date DESC";      
                      $resultnew = $conn->query($sqlnew);
                      if ($resultnew->num_rows > 0) {
                          while($row_new = $resultnew->fetch_assoc()) {
                              echo "<div class='don-ok'>";
                              $path_img = '../admin/image';
                              $prd_img_new=$path_img .'/' . $row_new['prd_img'];
                              echo "<img src='" . $prd_img_new. "' alt='ảnh'>";
                             echo'<div class="order_details">
                             <div class="order_details">
                                 <h6 class="product">'.$row_new["oder_prd"].'</h6>';
                                 echo '<div class="details">
                                 <p class="price">Giá: ' . $row_new["prd_price"] . '</p>';                             
                                 echo'<p class="quantity">'.$row_new["oder_quantity"].'</p>';
                                 echo'<p class="total">Thành tiền:'.$row_new["order_total"].'đ</p>';
                                 echo' </div>
                                 <p class="time">'.$row_new["order_date"].'</p>
                             </div>
                         </div>
                     </div>';
                          }
                      }             
                        else{
                            echo"<h3>Không có đơn hàng nào!!!<a href='product.php'>Mua ngay</a></h3>";
                        } 
                        $conn->close();             
                        ?>
                        </li>
                </ul>
            </section>
            <section class="don-thanh-cong">
                <h2>Đơn hoàn thành</h2>
                <ul class="success-orders">
                <div class="form_order" ></div>
                    <li><?php
                        $userorder = $_SESSION['username'];
                        require('../config/connect.php');
                        mysqli_set_charset($conn, 'utf8');
                        $sqlnew = "SELECT orders.order_id, orders.oder_prd, orders.order_date, orders.oder_quantity, orders.order_total, products.prd_img, products.prd_price, products.prd_id
                                   FROM orders
                                   JOIN products ON orders.oder_prd = products.prd_name
                                   WHERE orders.oder_username = '$user_curtainly' AND orders.trang_thai = 'Giao hàng thành công'
                                   ORDER BY orders.order_date DESC";  
                      $resultnew = $conn->query($sqlnew);
                      if ($resultnew->num_rows > 0) {
                          while($row_new = $resultnew->fetch_assoc()) {
                              echo "<div class='don-ok'>";
                              $path_img = '../admin/image';
                              $prd_img_new=$path_img .'/' . $row_new['prd_img'];
                              echo "<img src='" . $prd_img_new. "' alt='ảnh'>";
                             echo'<div class="order_details">
                             <div class="order_details">
                                 <h6 class="product">'.$row_new["oder_prd"].'</h6>';
                                 echo '<div class="details">
                                 <p class="price">Giá: ' . $row_new["prd_price"] . '</p>';                             
                                 echo'<p class="quantity">'.$row_new["oder_quantity"].'</p>';
                                 echo'<p class="total">Thành tiền:'.$row_new["order_total"].'đ</p>';
                                 echo' </div>
                                 <p class="time">'.$row_new["order_date"].'</p>
                             </div>
                         </div>
                     </div>';
                          }
                      }             
                        else{
                            echo"<h3>Không có đơn hàng nào!!!<a href='product.php'>Mua ngay</a></h3>";
                        }   
                        $conn->close();      
                        ?></li>
                </ul>
            </section>
            <section class="don-huy">
                <h2>Đơn đã hủy</h2>
                <ul class="huy-orders">
                <div class="form_order" ></div>
                    <li><?php
                       $user_curtainly = $_SESSION['username'];
                       require('../config/connect.php');
                       mysqli_set_charset($conn, 'utf8');
                       
                       $sqlnew = "SELECT orders.order_id, orders.oder_prd, orders.order_date, orders.oder_quantity, orders.order_total, products.prd_img, products.prd_price, products.prd_id
                                   FROM orders
                                   JOIN products ON orders.oder_prd = products.prd_name
                                   WHERE orders.oder_username = '$user_curtainly' AND orders.trang_thai = 'Đã Hủy'
                                   ORDER BY orders.order_date DESC";
                       
                       $resultnew = $conn->query($sqlnew);
                       
                       if ($resultnew->num_rows > 0) {
                           while ($row_new = $resultnew->fetch_assoc()) {
                               echo "<div class='don-ok'>";
                               $path_img = '../admin/image';
                               $prd_img_new = $path_img . '/' . $row_new['prd_img'];
                               echo "<img src='" . $prd_img_new . "' alt='ảnh'>";
                       
                               echo '<div class="order_details">
                                       <h6 class="product">' . $row_new["oder_prd"] . '</h6>
                                       <div class="details">
                                           <p class="price">Giá: ' . $row_new["prd_price"] . '</p>
                                           <p class="quantity">' . $row_new["oder_quantity"] . '</p>
                                           <p class="total">Thành tiền:' . $row_new["order_total"] . 'đ</p>
                                       </div>
                                       <p class="time">' . $row_new["order_date"] . ' <a href="product_detail.php?prd_id=' . $row_new['prd_id'] . '"><button style="background:#fff;color:green;border:none">Mua lại</button></a></p>
                                   </div>
                               </div>';
                           }
                       } else {
                           echo "<h3>Không có đơn hàng nào!!!<a href='product.php'>Mua ngay</a></h3>";
                       }
                       $conn->close();
                       ?>
                            
                        </li>
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
    <script>
var cancelOrderBtns = document.querySelectorAll("#cancelOrderBtn");

cancelOrderBtns.forEach(function(btn) {
  btn.addEventListener("click", function() {
    var order_id = this.getAttribute("data-order-id");
    var confirmed = confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');
    if (confirmed) {
        window.location.href = 'remove_product.php?order_id=' + order_id;
    }
    else{
    }
  });
});

</script>



</body>

