<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Thông Báo</title>
    <link rel="stylesheet" href="https://cdnjs.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            position: relative;
        }
        
        .container {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            margin-top: 0;
        }
        
        .notification {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
        }
        
        .notification p {
            margin: 0;
        }
        
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 8px 15px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .back-button:hover {
            background-color: #555;
        }
        
        .back-icon {
            position: absolute;
            top: 12px;
            left: 15px;
            color: #fff;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <a class="back-button" href="javascript:history.go(-1)">
        <div>
            <i class="fas fa-arrow-left"></i> Quay lại
        </div>

    </a>

    <div class="container">
        <h1>Chi Tiết Thông Báo</h1>

        <div class="notification">
            <div>
                <h4>Dear HK restaurant</h4>
            </div>
            <?php
if (isset($_GET['id']) ||(!empty($_GET['id'])) ){
    $ct_id = $_GET['id']; 
    require('../config/connect.php');
    mysqli_set_charset($conn, 'utf8');
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE ct_id = ?");
    $stmt->bind_param("i", $ct_id); // i: kiểu integer
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div>
                <h4>Tên tôi là: " . $row['ct_name'] . "</h4>
                <h4>Số điện thoại: " . $row['ct_numberphone'] . "</h4>
                <h4>Email: " . $row['ct_email'] . "</h4>
            </div>
            <div>
                <h4>Vấn đề: " . $row['ct_problem'] . "</h4>
                <h4>Chi tiết:</h4>
                <p>" . $row['ct_detail'] . "</p>
            </div>
            <h4 style='margin-left: 20%;'>Mong cửa hàng phản hồi sớm cho tôi!!!</h4>
        </div>";
    }
}
$conn->close();
?>

    </div>

</body>

</html>