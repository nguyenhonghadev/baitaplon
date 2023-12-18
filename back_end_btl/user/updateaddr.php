<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật địa chỉ</title>
    <link rel="stylesheet" href="../css/info.css">
</head>
<body>
    <div class="editer">
        <div class="billing-address-form">
            <form action="updateaddr.php" method="post">
                <h1 style="font-family: Arial;font-weight: 100;">Cập nhật địa chỉ</h1>
                <p><input name="nameoder" type="text" placeholder="Họ và Tên" id="name" required></p>
                <p><input name="addressoder" type="text" placeholder="Địa Chỉ" minlength="15" id="address" required></p>
                <p><input name="phoneoder" type="tel" placeholder="Số điện Thọai" id="phone" required></p>
                <input type="submit" style="font-family: 'Poppins', sans-serif;
                    display: inline-block;
                    background-color: #F28123;
                    color: #fff;
                    padding: 10px 20px;border-radius: 2em;" value="Xác Nhận">
            </form>
        </div>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nameoder'], $_POST['addressoder'], $_POST['phoneoder'], $_SESSION['username'])) {
    require('../config/connect.php');
    mysqli_set_charset($conn, 'utf8');
    
    $nameoder = $_POST['nameoder'];
    $addressoder = $_POST['addressoder'];
    $phoneoder = $_POST['phoneoder'];
    $user4 = $_SESSION['username'];

    $address = $nameoder . ', ' . $phoneoder . ', ' . $addressoder;
    $sql = "UPDATE users SET address='$address' WHERE username='$user4'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Địa chỉ đã cập nhật thành công.')</script>";
        echo "<script>window.location.href = '../page/info.php';</script>";
    } else {
        echo "<script>alert('Đã xảy ra lỗi khi cập nhật địa chỉ.')</script>";
    }
    $conn->close();
} 
?>

