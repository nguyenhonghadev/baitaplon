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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
        <div id="update-address" style="background-color: aliceblue;max-width: 40em;position: fixed;z-index: 1000;top:20%;left:40%; display: none;">
            <div class="billing-address-form">
                <form action="thanhtoan.php" method="post">
                    <button id="close-btn" style="background-color:aliceblue;border: none;margin-left: 99%;margin-top: -2em;" onclick="hideUpdateForm()">X</button>
                    <h2 style="font-family: Arial;font-weight: 100;">Cập nhật địa chỉ</h2>
                    <p><input name="nameoder" type="text" placeholder="Họ và Tên" id="name" required></p>
                    <p><input name="addressoder" type="text" placeholder="Địa Chỉ" minlength="15" id="address" required></p>
                    <p><input name="phoneoder" type="tel" placeholder="Số điện Thọai" id="phone" required></p>
                    <input type="submit" style="font-family: 'Poppins', sans-serif;display: inline-block;background-color: #F28123;color: #fff;padding: 10px 20px;border-radius: 2em;" value="Xác Nhận">
                </form>
            </div>
        </div>
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nameoder'], $_POST['addressoder'], $_POST['phoneoder'], $_SESSION['username'])) {
    require('../config/connect.php');
    mysqli_set_charset($conn, 'utf8');
    
    $nameoder = $_POST['nameoder'];
    $addressoder = $_POST['addressoder'];
    $phoneoder = $_POST['phoneoder'];
    $user4 = $_SESSION['username'];

    // Sử dụng prepared statement để tránh SQL Injection
    $address = $nameoder . ', ' . $phoneoder . ', ' . $addressoder;
    $_SESSION['address'] = $address;

    $sql = "UPDATE users SET address=? WHERE username=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('ss', $address, $user4);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Địa chỉ đã cập nhật thành công.')</script>";
        } else {
            echo "<script>alert('Không thể cập nhật địa chỉ.')</script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>alert('Lỗi truy vấn.')</script>";
    }
    
    $conn->close();
} 
?>


    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <?php
        include('../config/header1.php');
        ?>
    <!-- nav -->
    <!-- thanh toan -->
    <form method="post" action="thanhtoan.php">
            <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Địa Chỉ Giao Hàng:
						        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <div class="shipping-address-form">
                                                <?php
                                                require('../config/connect.php');
                                                if (isset($_SESSION['username'])) { 
                                                    $usernameid = $_SESSION['username'];
                                                    mysqli_set_charset($conn, 'utf8');
                                                    $sql = "SELECT * FROM users WHERE username='$usernameid'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        $row = mysqli_fetch_assoc($result);
                                                        echo "<p>" . $row['address'] . "</p>";
                                                        $_SESSION['address']=$row['address'];
                                                    } else {
                                                        echo "Chưa cập nhật địa chỉ";
                                                    }
                                                    mysqli_close($conn);
                                                } else {
                                                    echo "Tên người dùng không tồn tại.";
                                                }
                                                ?>
                                            </div>
                                            <button type="button" onclick="showUpdateForm()" style="border: none;background-color: #fff;color: red;">Sửa</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Phương thức Giao Hàng:
						        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <h5> Quý khách muốn thanh toán theo:</h5>
                                            <input type="radio" id="nhanhang" name="option" value="Thanh toán khi nhận hàng">Thanh toán sau khi nhận hàng.<br>
                                            <input type="radio" id="banking" name="option" value="Đã thanh toán">Thanh toán trực tiếp qua banking.<br>
                                            <div id='message' style="display: none;">
                                                <p>Lời Nhắn</p>
                                            <input name="loinhan" type="text" >
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 ">
                    <div class="order-details-wrap ">
                        <table class="order-details ">
                            <thead>
                                <tr>
                                    <th>Đơn hàng của bạn</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body ">
                            <?php
                                                $total_amount = 0;
                                                if (isset($_SESSION['user_cart'][$_SESSION['username']])) {
                                                    foreach ($_SESSION['user_cart'][$_SESSION['username']] as $key => $prd) {
                                                        $total_price = (float)$prd['quantity'] * (float)$prd['price'];
                                                        $total_amount += $total_price;
                                                        $formatted_total_price = number_format($total_price, 2, ".", ",");
                                                        echo '<tr class="total-data">
                                                                <td><strong>' . $prd['name'] . '</strong></td>
                                                                <td>' . $prd['quantity'] . '</td>
                                                                <td>' . $formatted_total_price . '</td>
                                                            </tr>';
                                                    }
                                                }
                                                $shipping_cost = 25000;
                                                $total_amount += $shipping_cost;
                                                echo '<tr class="total-data">
                                                        <td><strong>Vận chuyển </strong></td>
                                                        <td></td>
                                                        <td>' . number_format($shipping_cost, 2, ".", ",") . 'đ</td>
                                                    </tr>';
                                                echo '<tr class="total-data">
                                                        <td><strong>Tổng  </strong></td>
                                                        <td></td>
                                                        <td>' . number_format($total_amount, 2, ".", ",") . 'đ</td>
                                                    </tr>';
                                                
                                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" value="<?php echo $total_amount; ?>" name="total_pay">
                        <button type="submit" name="pay_now" style=" border: none;font-family: 'Poppins', sans-serif; display: inline-block; background-color: #F28123; color: #fff; padding: 10px 20px; border-radius: 2em;">Thanh Toán</button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
   <?php
   include('../config/footer.php');
   ?>

    <!-- Back to Top -->
    <a href="contact.html " class="btn btn-lg btn-primary btn-lg-square back-to-top " aria-label="back"><i class="bi bi-arrow-up "></i></a>
    </div>

    <!-- JavaScript Libraries -->
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

    <!-- jquery -->
    <script src="../assets/js/jquery-1.11.3.min.js "></script>
    <!-- bootstrap -->
    <script src="../assets/bootstrap/js/bootstrap.min.js "></script>
    <!-- count down -->
    <script src="../assets/js/jquery.countdown.js "></script>
    <!-- isotope -->
    <script src="../assets/js/jquery.isotope-3.0.6.min.js "></script>
    <!-- waypoints -->
    <script src="../assets/js/waypoints.js "></script>
    <!-- owl carousel -->
    <script src="../assets/js/owl.carousel.min.js "></script>
    <!-- magnific popup -->
    <script src="../assets/js/jquery.magnific-popup.min.js "></script>
    <!-- mean menu -->
    <script src="../assets/js/jquery.meanmenu.min.js "></script>
    <!-- sticker js -->
    <script src="../assets/js/sticker.js "></script>
    <!-- main js -->
    <script src="../assets/js/main.js "></script>

    <!-- Template Javascript -->
    <script src="../js/main.js "></script>
    <script>
$(document).ready(function() {
    $('input[name="option"]').change(function() {
        if ($(this).val() === "Thanh toán khi nhận hàng") {
            $('#message').show(); // Changed from $('$message').show();
        } else {
            $('#message').hide();
        }
    });
});


    </script>
    <script src="../js/thanhtoan.js "></script>
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
    function showUpdateForm() {
        document.getElementById('update-address').style.display = "block";
    }
    function hideUpdateForm() {
        document.getElementById('update-address').style.display = "none";
    }
</script>
</body>
  
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['option']) && isset($_SESSION['user_cart'][$_SESSION['username']]) && isset($_POST['loinhan'])) {
        require('../config/connect.php');
        require('function.php');

        $user4 = $_SESSION['username'];
        $type_pay = $_POST['option'];
        $total_pay = $_POST['total_pay'];
        $status = $_POST['loinhan'];
        $address_oder = $_SESSION['address'];

        if ($address_oder == '') {
            echo "<script>alert('Vui lòng cập nhật địa chỉ giao hàng');</script>";
            exit();
        }

        
            if ($type_pay === 'Thanh toán khi nhận hàng') {
                if ($total_price > 2000000) {
                    echo "<script>alert('Bạn cần đặt cọc trước 30% giá trị đơn hàng');</script>";
                    echo "<script>window.location.href = 'Thanhtoan1.php?total-30=" . urlencode($total_pay) . "';</script>";
                } else {
                    foreach ($_SESSION['user_cart'][$_SESSION['username']] as $key => $prd) {
                        $nameprd = $prd['name'];
                        $quantityprd = $prd['quantity'];
                        $priceprd = $prd['price'];
            
                        $total_price = (float)$quantityprd * (float)$priceprd;
            
                        $sql = "SELECT * FROM products WHERE prd_name ='$nameprd'";
                        $result = $conn->query($sql);
            
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $soluong = $row['prd_quantity'];
                            $newquantity = (int)$soluong - (int)$quantityprd;
            
                            if ($newquantity < 0) {
                                echo "<script>alert('Sản phẩm $nameprd không đủ số lượng');</script>";
                                exit();
                            }
            
                            $sql1 = "UPDATE products SET prd_quantity ='$newquantity' WHERE prd_name ='$nameprd'";
                            $conn->query($sql1);
                        }
            
                        $idoder = generateRandomString();
                    $ghi_chu = 'Thanh toán 100% khi nhận hàng';
                    $sql_pay = "INSERT INTO orders (order_id, oder_username, oder_prd, oder_quantity, type_pay, order_status, order_total, order_address, ghi_chu) VALUES ('$idoder', '$user4', '$nameprd', '$quantityprd', '$type_pay' ,'$status','$total_price', '$address_oder', '$ghi_chu')";
                    $conn->query($sql_pay);
                    unset($_SESSION['user_cart'][$_SESSION['username']][$key]);
                    unset($_SESSION['address']);
                    echo "<script>alert('Thanh toán thành công');</script>";
                    echo "<script>window.location.href = 'info.php';</script>";
                }
            }
            } else {
                echo "<script>window.location.href = 'Thanhtoan1.php?total-100=".urlencode($total_pay)."';</script>";
            }
        }
        $conn->close();
    } 
?>
