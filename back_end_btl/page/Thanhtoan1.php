<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h3{
            text-align: center;
        }
        
        label {
            display: block;
            margin-top: 20px;
            font-size: 1em;
            margin-right: 65%;
        }
        
        input[type="file"] {
            display: block;
            margin-top: 8px;
        }
        .loinhan{
            display: block;
            margin-top: 8px;
            width: 25em;
            height: 3em;
        }
        
        img {
            display: block;
            margin: 20px auto;
            max-width: 35%;
            height: auto;
        }
        
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #0056b3;
        }
       /* CSS cho phần tải ảnh minh chứng */
       .image-inputs {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 7em;
    width: 10em;
}

.image-upload {
    position: relative;
    padding: 10px;
    border: 2px dashed #ccc;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    text-align: center;
}

.image-label {
    font-size: 18px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 5px; 
    padding-left: 3.5em;
}

.image-label i {
    margin-bottom: 5px;
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

    </style>
</head>
<body>
    <div class="container">
        <form action="Thanhtoan1.php" method="POST" enctype="multipart/form-data">
            <h1>
                Bạn hãy hoàn tất việc thanh toán cho đơn hàng của mình bằng cách chuyển khoản đến tài khoản sau:
                <?php
                if(isset($_GET['total-30'])){
                    $total_30=(int)$_GET['total-30'];
                    $total=$total_30*0.3;
                    echo "<h3>Bạn cần thanh toán <span style='color:red'>".$total."đ</span> cho đơn hàng của mình</h3>";
                }
                else if(isset($_GET['total-100'])){ 
                     $total_100=$_GET['total-100'];
                    echo "<h3>Bạn cần thanh toán<span style='color:red'>".$total_100."đ</span> cho đơn hàng của mình</h3>";
                }
                ?>
               <img src="../image/mã qr.jpg" alt="mã qr">
               <div class="image-inputs">
                <div class="image-upload">
                <label for="minh-chung" class="image-label">
                    <i class="fas fa-cloud-upload-alt"></i> Tải ảnh minh chứng
                    <input type="file" id="minh-chung" name="minh-chung" onchange="checkFileUpload()" style="display: none;">
                </label>
               </div>
             </div>
                <label for="loinhan">Lời Nhắn</label>
                <input class="loinhan" name="loinhan" type="text">
                <input type="hidden" value="<?php echo $total_30; ?>" name="nhanhangthanhtoan">
                <button type="submit" id="submitBtn" style="display: none;">Hoàn tất thanh toán</button>
             </h1>
        </form>
    </div>
</body>
<script>
 document.addEventListener('DOMContentLoaded', function(){
  var fileInput = document.getElementById('minh-chung');
  var submitBtn = document.getElementById('submitBtn');

  fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
      submitBtn.style.display = 'block'; 
    } else {
      submitBtn.style.display = 'none';
    }
  });
});

</script>
</html>

    <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['minh-chung']) && isset($_POST['loinhan'])) {
    $img = $_FILES['minh-chung']['name'];
    $message = $_POST['loinhan'];
    $dir_img = '../admin/image/';

    if (isset($_POST['nhanhangthanhtoan'])) {
        $total_30 = floatval($_POST['nhanhangthanhtoan']);
        $total = $total_30 - ($total_30 * 0.3);
    }

    $check = getimagesize($_FILES["minh-chung"]["tmp_name"]);

    if ($check !== false) {
        if (move_uploaded_file($_FILES["minh-chung"]["tmp_name"], $dir_img . $img)) {
            require('../config/connect.php');
            require('function.php');
            $user4 = $_SESSION['username'];

            if (!empty($_SESSION['user_cart'][$user4])) {
                $all_success = true;

                foreach ($_SESSION['user_cart'][$user4] as $key => $prd) {
                    $nameprd = $prd['name'];
                    $quantityprd = $prd['quantity'];
                    $priceprd = $prd['price'];
                    $status = $_POST['loinhan'];
                    $total_price = (float)$quantityprd * (float)$priceprd;
                    $address_oder = $_SESSION['address'];

                    $sql = "SELECT * FROM products WHERE prd_name = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $nameprd);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $soluong = $row['prd_quantity'];
                        $newquantity = (int)$soluong - (int)$quantityprd;
                        $sql1 = "UPDATE products SET prd_quantity = ? WHERE prd_name = ?";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->bind_param("ss", $newquantity, $nameprd);
                        $stmt1->execute();
                    }

                    $idoder = generateRandomString();
                    if (!empty($total_30)) {
                        $type_pay = 'Thanh toán khi nhận hàng';
                        $con_no = $total_30 - $total;
                        $ghichu = 'Đã thanh toán 30% còn nợ' . $con_no . 'đ';
                    } else {
                        $type_pay = 'Đã thanh toán';
                        $ghichu = 'Đã thanh toán 100%';
                    }

                    $sql_pay = "INSERT INTO orders (order_id, oder_username, oder_prd, oder_quantity, type_pay, order_status, order_total, order_address, Image_bank, ghi_chu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt_pay = $conn->prepare($sql_pay);
                    $stmt_pay->bind_param("sssissssss", $idoder, $user4, $nameprd, $quantityprd, $type_pay, $status, $total_price, $address_oder, $img, $ghichu);
                    $query_result = $stmt_pay->execute();

                    if ($query_result !== TRUE) {
                        $all_success = false;
                    }
                }

                if ($all_success) {
                    unset($_SESSION['user_cart'][$user4]);
                    unset($_SESSION['address']);
                    echo "<script>alert('Thanh toán cho tất cả sản phẩm thành công');</script>";
                    echo "<script>window.location.href = 'info.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Thanh toán cho một số sản phẩm bị lỗi, vui lòng thử lại hoặc liên hệ cửa hàng');</script>";
                    echo "<script>window.location.href = 'info.php';</script>";
                    exit();
                }
            }
        }
    }
}
?>