<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="../css/info.css">
</head>
<body>
<div class="editer">

<div class="change-password">
    <form action="changepw.php" method="post">
        <h1 style="font-family: Arial;font-weight: 100;">Đổi mật khẩu</h1>
        <p><input name="oldpassword" type="text" placeholder="Mật khẩu cũ" id="oldpassword" required></p>
        <p><input name="newpassword" type="text" placeholder="Mật khẩu mới" id="newpassword" required></p>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['newpassword']) && isset($_POST['oldpassword']) && isset($_SESSION['username'])) {
        $newpassword = $_POST['newpassword'];
        $oldpassword = $_POST['oldpassword'];
        $user = $_SESSION['username'];

        require('../config/connect.php');

        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $passwordHash = $row['password'];
            if($oldpassword===$passwordHash){
                    $uppercaseCheck = preg_match('@[A-Z]@', $newpassword);
                    if ($uppercaseCheck) {
                        
                        $update = "UPDATE users SET password = '$newpassword' WHERE username = '$user'";
                       $kq=$conn->query($update);
    
                        if ($kq === TRUE) {
                            echo "<script>alert('Mật khẩu đã được cập nhật.')</script>";
                            echo "<script>window.location.href = '../page/info.php';</script>";
                        } else {
                            echo "<script>alert('Cập nhật mật khẩu không thành công.')</script>";
                            echo "<script>window.location.href = 'changepw.php';</script>";
                        }
                        $stmt_update->close();
                    } 
                    
                    else {
                        echo "<script>alert('Cập nhật mật khẩu không thành công, cần có ít nhất 1 ký tự hoa trong mật khẩu.')</script>";
                        echo "<script>window.location.href = 'changepw.php';</script>";
                    }
            }
            else {
                echo "<script>alert('Mật khẩu cũ nhập không đúng, vui lòng thử lại.')</script>";
                echo "<script>window.location.href = 'changepw.php';</script>";
            }
        } else {
            echo "<script>alert('Người dùng không tồn tại.')</script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
