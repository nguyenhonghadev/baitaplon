<?php
if(isset($_GET['delete']) && !empty($_GET['delete'])) {
    $prd_id = $_GET['delete'];
    require('../config/connect.php');
    mysqli_set_charset($conn,'UTF8');
    
    // Sử dụng prepared statement để xóa sản phẩm có ID cụ thể
    $sql = "DELETE FROM products WHERE prd_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $prd_id); // 's' đại diện cho kiểu string
    
    if(mysqli_stmt_execute($stmt)){
        if(mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Xóa thành công')</script>";
            header("Location: admin.php");
            exit(); // Kết thúc kịch bản sau khi chuyển hướng
        } else {
            echo "<script>alert('Không tìm thấy sản phẩm có ID này')</script>";
        }
    } else {
        echo "<script>alert('Xóa thất bại')</script>";
    }

    mysqli_stmt_close($stmt); // Đóng statement
    mysqli_close($conn); // Đóng kết nối
} 
?>
<?php
if(isset($_GET['update']) && !empty($_GET['update'])) {
    require('../config/connect.php');
    $oldid = $_GET['update'];
    // Sử dụng prepared statement để tránh SQL Injection
    $stmt = $conn->prepare("SELECT * FROM products WHERE prd_id = ?");
    $stmt->bind_param('s', $oldid);
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

        // Kiểm tra và thêm các trường cần cập nhật nếu có giá trị từ biểu mẫu

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
        $sql .= " WHERE prd_id='$oldid'";

        // Thực hiện câu lệnh UPDATE
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Cập nhật thành công');
                    window.location.href = 'admin.php'; // Chuyển hướng người dùng sau khi thông báo xuất hiện
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
    <form action="mode.php?update=<?php echo $_GET['update']; ?>" method="post" enctype="multipart/form-data">
        <table class="overlayTable table-outline table-content table-header">
            <tr>
                <th colspan="2">Thêm Sản Phẩm</th>
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
</body>
</html>

</body>
</html>

