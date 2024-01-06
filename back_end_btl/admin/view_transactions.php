<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .khachhang {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Thêm CSS cho bảng */
        .table-header {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table-header th,
        .table-header td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table-header th {
            background-color: #F28123;
            color: white;
        }

        .table-content,
        .table-footer {
            margin-top: 20px;
        }

        /* Thêm CSS cho nút Thêm Người Dùng */
        .table-footer button {
            background-color: #F28123;
            color: white;
            border: none;
            padding: 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 0.3em;
        }

        /* Thêm CSS cho overlayTable */
        .overlayTable {
            display: block;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-collapse: collapse;
            width: 400px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 9999;
            border-radius: 0.3em;
           
        }
    </style>
    <title>View Transactions</title>
</head>

<body>
<?php
if(isset($_GET['oderid'])){
    require('../config/connect.php');
    $order_id=$_GET['oderid'];
    $path='../admin/image/';
    $sql="SELECT * FROM orders WHERE order_id= '$order_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $img=$path . $row['Image_bank'];
        if($row['Image_bank']!=""){
            echo'<div class="table-content">
            <a href="javascript:history.go(-1)" style=" text-decoration:none">Quay lại</a>
        </div>';
        echo '
    <div style="margin: 0 auto; text-align: center;">
        <img src="' . $img . '" style="width: 25%; height: 30%;" >
    </div>
';


    }else{
        echo "<h1 style='text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);font-size:6em'>Không có ảnh!</h1>";
        echo'<script>
        setTimeout(function(){
            history.back();
        }, 2000);
    </script>
    ';
    }

}}

?>

   
        <?php
        require('../config/connect.php');
        mysqli_set_charset($conn, 'utf8');

        if (isset($_GET['username'])) {
            $selectedUsername = $_GET['username'];
echo'<div class="khachhang">';
            $sql = "SELECT * FROM orders WHERE oder_username = '$selectedUsername'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                echo "<h2>Các giao dịch của khách hàng $selectedUsername:</h2>";
                echo "<table class='table-header'>
                        <tr>
                            <th>Mã Giao Dịch</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ngày Đặt</th>
                            <th>Tình Trạng</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td class='text-center'>" . $row['order_id'] . "</td>
                            <td class='text-center'>" . $row['oder_prd'] . "</td>
                            <td class='text-center'>" . $row['order_date'] . "</td>";
                    if (!empty($row['status'])) {
                        echo "<td class='text-center'>" . $row['status'] . "</td>";
                    } else {
                        echo "<td class='text-center'>" . $row['trang_thai'] . "</td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Không có giao dịch nào của khách hàng $selectedUsername.";
                echo'<div class="table-content">
                <a href="javascript:history.go(-1)" style=" text-decoration:none">Quay lại</a>
            </div>
        </div>';
            }
        } 

        $conn->close();
       
        ?>

        
</body>

</html>
