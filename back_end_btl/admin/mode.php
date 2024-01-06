<?php
if(isset($_GET['delete']) && !empty($_GET['delete'])) {
    $prd_id = $_GET['delete'];
    require('../config/connect.php');
    mysqli_set_charset($conn,'UTF8');

    $sql = "DELETE FROM products WHERE prd_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $prd_id); 
    
    if(mysqli_stmt_execute($stmt)){
        if(mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'admin.php?quanly=product';
                    },500); 
                  </script>";
            exit();
        } else {
            echo "<script>alert('Không tìm thấy sản phẩm có ID này')</script>";
        }
    } else {
        echo "<script>alert('Xóa thất bại')</script>";
    }

    mysqli_stmt_close($stmt); 
    mysqli_close($conn);
} 
?>
<?php
if(isset($_GET['update']) && !empty($_GET['update'])) {
    require('../config/connect.php');
    $username = $_GET['update'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE prd_id = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $oldcategory = $row['prd_category'];
            $oldimg = $row['prd_img'];
        } 
    }

    if(isset($_POST['newname']) || isset($_POST['newdetail']) || isset($_POST['newprice']) || isset($_POST['newquantity']) || isset($_POST['newcategory']) || isset($_FILES['newimg'])) {
        $sql = "UPDATE products SET";
        if(!empty($_POST["newname"])){
            $newname = $_POST["newname"];
            $sql .= " prd_name='$newname',";
        }
        if(!empty($_POST["newprice"])){
            $newprice = $_POST["newprice"];
            $sql .= " prd_price='$newprice',";
        }
        if(!empty($_POST["newquantity"])){
            $newquantity = $_POST["newquantity"];
            $sql .= " prd_quantity='$newquantity',";
        }
        if(!empty($_POST["newdetail"])){
            $newdetail = $_POST["newdetail"];
            $sql .= " prd_detail='$newdetail',";
        }
        if($_POST["newcategory"] != $oldcategory){
            $newcategory = $_POST["newcategory"];
            $sql .= " prd_category='$newcategory',";
        }
        if(isset($_FILES['newimg']) && $_FILES['newimg']['error'] === UPLOAD_ERR_OK){
            $newimg = $_FILES['newimg']['name'];
            $target_dir = 'image/';
            $target_file = $target_dir . basename($_FILES["newimg"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Kiểm tra xem tệp tin mới khác với tệp tin cũ
            if($newimg != $oldimg) {
                // Thực hiện xử lý tải tệp tin ảnh lên (nếu cần)
                // Kiểm tra xem file có phải là ảnh thực và không phải là ảnh giả mạo
                $check = getimagesize($_FILES["newimg"]["tmp_name"]);
                if($check !== false) {
                    // File là ảnh - " . $check["mime"] . ".
                    $uploadOk = 1;
        
                    // Nếu $uploadOk vẫn là 1, thử tải ảnh lên
                    if (move_uploaded_file($_FILES["newimg"]["tmp_name"], $target_file)) {
                        // Nếu tải ảnh lên thành công, cập nhật tên ảnh trong cơ sở dữ liệu
                        $sql .= " prd_img='$newimg',";
                    } else {
                        echo "Xin lỗi, có lỗi xảy ra khi tải tệp tin lên.";
                    }
                } else {
                    echo "Tệp tin không phải là ảnh.";
                }
            }
        }
        
        
        $sql = rtrim($sql, ',');
        $sql .= " WHERE prd_id='$username'";

        // Thực hiện câu lệnh UPDATE
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Cập nhật thành công');
                    window.location.href = 'admin.php?quanly=product'; // Chuyển hướng người dùng sau khi thông báo xuất hiện
                  </script>";
            exit(); // Dừng việc thực thi ngay sau khi chuyển hướng
        } else {
            echo "<script>alert('Không có gì để cập nhật')</script>";
            header("Location: admin.php");
        }

        $conn->close();
    }
}
?>

<!-- Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//css//admin.css">
</head>
<body>
<?php
if (isset($_GET['update']) && !empty($_GET['update'])) {
    ?>
    <form action="mode.php?update=<?php echo $_GET['update']; ?>" method="post" enctype="multipart/form-data">
        <table class="overlayTable table-outline table-content table-header">
            <tr>
                <th colspan="2">Sửa Sản Phẩm</th>
            </tr>
            <!-- Các trường input -->
            <tr>
                <td>Tên sản phẩm:</td>
                <td><input type="text" name="newname"></td>
            </tr>
            <tr>
                <td>Ảnh sản phẩm</td>
                <td><input type="file" name="newimg"></td>
            </tr>
            <tr>
                <td>Mô tả sản phẩm:</td>
                <td><textarea style="height: 5em;" name="newdetail"></textarea></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="text" name="newquantity"></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><input type="text" name="newprice"></td>
            </tr>
            <tr>
                <td>Loại hàng hóa</td>
                <td>
                    <select name="newcategory">
                        <option value="Đồ ăn">Đồ Ăn</option>
                        <option value="Đồ uống">Đồ Uống</option>
                        <option value="Tráng miệng">Đồ Tráng Miệng</option>
                        <!-- Các option khác -->
                    </select>
                </td>
            </tr>
            <!-- Nút submit -->
            <tr>
                <td colspan="2" class="table-footer"><input type="submit" style="width: 10em;height: 3em;background-color: #F28123;color: white;" value="Cập Nhật"></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

</body>
</html>
<?php
if (isset($_GET['add']) && !empty($_GET['add'])) {
    require('../config/connect.php');
    mysqli_set_charset($conn, 'utf8');
    $prd_id = $_GET['add'];
    $sql = "SELECT * FROM sp_noibat WHERE sp_id = '$prd_id'";
    $result=$conn->query($sql);
if ($result->num_rows > 0) {
        echo "<script>alert('Sản phẩm đã tồn tại')</script>";
        echo "<script>window.location = 'admin.php?quanly=product'</script>";
    } else {
        $sql_select_product = "SELECT prd_id, prd_name, prd_img, prd_price FROM products WHERE prd_id = '$prd_id'";
        $kq=$conn->query($sql_select_product);
        if ($kq->num_rows > 0) {
            $row = $kq->fetch_assoc();
            $sp_id = $row['prd_id'];
            $sp_name = $row['prd_name'];
            $sp_img = $row['prd_img'];
            $sp_price = $row['prd_price'];

            $sql_insert = "INSERT INTO sp_noibat (sp_id, sp_name, sp_image, sp_price) VALUES ('$sp_id','$sp_name','$sp_img','$sp_price')";
            $stmt_insert = $conn->prepare($sql_insert);

            if ($stmt_insert->execute()) {
                echo "<script>alert('Đã Thêm vào sản phẩm nổi bật thành công')</script>";
                echo "<script>window.location = 'admin.php?quanly=product'</script>";
            } else {
                echo "<script>alert('Không thành công sản phẩm đã tồn tại')</script>";
                echo "<script>window.location = 'admin.php?quanly=product'</script>";
            }

            $stmt_insert->close();
        } else {
            echo "<script>alert('Sản phẩm không tồn tại')</script>";
            echo "<script>window.location = 'admin.php?quanly=product'</script>";
        }

        $stmt_select_product->close();
    }

    $stmt_check_existing->close();
    mysqli_close($conn);
}


?>
<?php
if (isset($_GET['deletenb']) && !empty($_GET['deletenb'])) {
    $prd_id = $_GET['deletenb'];
    require('../config/connect.php');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "DELETE FROM sp_noibat WHERE sp_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $prd_id); 
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'admin.php?quanly=spnb';
                    },500); 
                  </script>";
            exit();
        } else {
            echo "<script>alert('Không tìm thấy sản phẩm có ID này')</script>";
        }
    } else {
        echo "<script>alert('Xóa thất bại')</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?><?php
if (isset($_GET['deleteuser']) && !empty($_GET['deleteuser'])) {
    $prd_id = $_GET['deleteuser'];
    require('../config/connect.php');
    mysqli_set_charset($conn, 'UTF8');
    $sql = "DELETE FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $prd_id); 
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'admin.php?quanly=user';
                    },500); 
                  </script>";
            exit(); 
        } else {
            echo "<script>alert('Không tìm thấy sản phẩm có ID này')</script>";
        }
    } else {
        echo "<script>alert('Xóa thất bại')</script>";
    }
    mysqli_stmt_close($stmt); 
    mysqli_close($conn);
}

?>
<?php
if (isset($_GET['updateuser']) && !empty($_GET['updateuser'])) {
    require('../config/connect.php');
    $username = $_GET['updateuser'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newpassword = $_POST['newpassword'];
        $newaddress=$_POST['newaddress'];
        $newnumberphone=$_POST['newnumberphone'];
            if (!empty($_POST["newpassword"])) {
                if(strlen($newpassword) >= 8 && preg_match('/[A-Z]/', $newpassword)) {
                    $sql .= " password='$newpassword',";
                } else {
                    echo "<script>
                        alert('Mật khẩu mới yêu cầu ít nhất 8 ký tự và chứa ít nhất một ký tự viết hoa');
                        window.location.href = 'admin.php?quanly=user'; // Chuyển hướng người dùng sau khi thông báo xuất hiện
                    </script>";
                    exit(); 
                }
            }
            
            
            if (!empty($_POST["newnumberphone"])) {
               
                $sql .= " numberphone='$newnumberphone',";
            }
            if (!empty($_POST["newaddress"])) {
              
                $sql .= " address='$newaddress',";
            }
            $sql = rtrim($sql, ',');
            $sql .= " WHERE username='$username'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Cập nhật thành công');
                        window.location.href = 'admin.php?quanly=user'; // Chuyển hướng người dùng sau khi thông báo xuất hiện
                      </script>";
                exit(); 
            } else {
                echo "<script>alert('Không có gì để cập nhật')</script>";
                header("Location: admin.php?quanly=user");
                exit(); 
            }
    }
    $conn->close();
}
?>

<!-- Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//css//admin.css">
</head>
<body>
    <?php
    if (isset($_GET['updateuser']) && !empty($_GET['updateuser'])) {
    ?>
    <form action="mode.php?updateuser=<?php echo $_GET['updateuser']; ?>" method="post" enctype="multipart/form-data">
        <table class="overlayTable table-outline table-content table-header">
            <tr>
                <th colspan="2">Sửa Tài Khoản</th>
            </tr>
            <!-- Các trường input -->
            <tr>
                <td>Mật Khẩu:</td>
                <td><input type="password" name="newpassword"></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="tel" name="newnumberphone"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="newaddress"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-footer"><input type="submit" style="width: 10em;height: 3em;background-color: #F28123;color: white;" value="Cập Nhật"></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>
</html>
<?php
if (isset($_GET['contact'])|| (!empty($_GET['contact'])) ){
    $ct_id = $_GET['contact'];
    require('../config/connect.php');

    if ($conn) {
        $sql = "DELETE FROM contacts WHERE ct_id=?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $ct_id);
            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>alert('Xóa thành công')</script>";
                } else {
                    echo "<script>alert('Không tìm thấy thông tin liên hệ này')</script>";
                }
                echo "<script>window.location.href = 'admin.php';</script>";
                exit(); // Terminate the script after redirection
            } else {
                echo "<script>alert('Xóa thất bại')</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Lỗi trong quá trình chuẩn bị truy vấn')</script>";
        }
        mysqli_close($conn); // Close the connection
    } else {
        echo "<script>alert('Lỗi kết nối đến cơ sở dữ liệu')</script>";
    }
} 

?>
<?php
if (isset($_GET['order']) && !empty($_GET['order'])) {
    $id = $_GET['order'];
    $new_status = $_POST['status'];
    require('../config/connect.php');
    $id = mysqli_real_escape_string($conn, $id);
    $new_status = mysqli_real_escape_string($conn, $new_status);

    $sql9 = "UPDATE orders SET trang_thai = '$new_status' WHERE order_id = '$id'";
    $result = $conn->query($sql9);

    if ($result) {
        echo "<script>alert('Cập nhật thành công!!')</script>";
        echo "<script>window.location.href='admin.php?quanly=donhang'</script>";
    } else {
        echo "<script>alert('Lỗi!!!!')</script>";
        echo "<script>window.location.href='admin.php?quanly=donhang'</script>";
    }
    $conn->close();
}
?>

<?php
require('../config/connect.php');
mysqli_set_charset($conn, 'UTF-8');
if(isset($_GET['delete_order'])){
 $order_id = $_GET['delete_order'];
    $sql = "DELETE FROM orders WHERE order_id = '$order_id'";
    $result = $conn->query($sql);
    if($result===TRUE){
        echo "<script>alert('Bạn đã xóa đơn hàng thành công')</script>";
        echo "<script>window.location.href='admin.php?quanly=donhang'</script>";
    }
    else{
        echo "<script>alert('lỗi!!!!!!')</script>";
        echo "<script>window.location.href='admin.php?quanly=donhang'</script>";
    }
}
?>
<?php
if(isset($_GET['huydon']))
{
    $order_id=$_GET['huydon'];
    require('../config/connect.php');
    require('../config/connect.php');
    $sql="SELECT oder_quantity, oder_prd FROM orders WHERE order_id = '$order_id'";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantity = $row['oder_quantity'];
        $prd_name = $row['oder_prd'];
        
       $sql ="SELECT prd_quantity FROM products WHERE prd_name = '$prd_name'";
       $result1=$conn->query($sql);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $quantity_old = $row1['prd_quantity'];
            $quantity_update = (int)$quantity_old + (int)$quantity;
            $sql="UPDATE products SET prd_quantity = '$quantity_update' WHERE prd_name = '$prd_name'";
           $result=$conn->query($sql);
        }
   $cancel_order_sql = "UPDATE orders SET trang_thai = 'Đã Hủy' WHERE order_id = '$order_id'";
   $cancel_order_result = $conn->query($cancel_order_sql);
    if($cancel_order_result===TRUE){
        echo "<script>alert('Bạn đã hủy đơn hàng thành công')</script>";
        echo "<script>window.location.href='admin.php?quanly=donhang'</script>";
    }
    else{
        echo "<script>alert('lỗi!!!!!!')</script>";
        echo "<script>window.location.href='admin.php?quanly=donhang'</script>";
    }
   
} 
$conn->close();
}
?>
