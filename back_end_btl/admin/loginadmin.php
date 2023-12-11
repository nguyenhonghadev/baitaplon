<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login {
            width: 30em;
            height: auto;
            border: 1px solid black;
            text-align: center;
            border-radius: 3em;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
        
        .label1 {
            font-size: large;
            margin-right: 8.5em;
        }
        
        .label2 {
            font-size: large;
            margin-right: 10.5em;
        }
        
        input {
            width: 20em;
            height: 2em;
            margin: 0.5em;
        }
        
        .submit {
            background-color: #F28123;
            width: 7em;
            height: 3em;
            color: white;
            font-size: larger;
            border: none;
            border-radius: 4em;
        }
    </style>
</head>
<body>
    <div class="login">
        <form method="post" action="loginadmin.php">
            <h1 class="title">ADMIN</h1>
            <label for="username" class="label1">Tên đăng nhập:</label><br>
            <input type="text" required name="username"><br>
            <label for="password" class="label2">Mật Khẩu:</label><br>
            <input type="password" required name="password"><br>
            <p style="color: red; display: none;" id="error_message">Sai thông tin đăng nhập, vui lòng thử lại</p><br>
            <input type="submit" class="submit" style="text-align: center;" value="Đăng Nhập"><br>
        </form>
    </div>
    <?php
    require('../config/connect.php');
    session_start();
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $_SESSION['username'] = $username;
            echo "<script>window.location.href = 'admin.php';</script>";
            exit();
        } else {
            echo '<script>document.getElementById("error_message").style.display = "block";</script>';
        }
    }
    ?>
    
</body>
<script>
    document.getElementById("login").addEventListener("submit", function(event) {
        var errorMessage = document.getElementById('error_message');
        errorMessage.style.display = 'none'; // Ẩn thông báo lỗi khi submit lại form

        // Kiểm tra thông tin trước khi submit
        var username = document.getElementsByName('username')[0].value;
        var password = document.getElementsByName('password')[0].value;

        if (username === '' || password === '') {
            errorMessage.innerText = 'Vui lòng điền đầy đủ thông tin';
            errorMessage.style.display = 'block'; // Hiển thị thông báo lỗi
            event.preventDefault(); // Ngăn chặn việc submit form
        }
    });
    
</script>

</html>