<?php
require('../config/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Xử lý và làm sạch dữ liệu $productId để tránh SQL injection (sử dụng các phương pháp như mysqli_real_escape_string hoặc parameterized queries)
    // ...
    
    // Thực hiện truy vấn xóa sản phẩm
    $sql = "DELETE FROM products WHERE prd_id='$productId'";
    if (mysqli_query($conn, $sql)) {
        // Trả về mã HTTP 200 (OK) nếu xóa thành công
        http_response_code(200);
    } else {
        // Trả về mã HTTP 500 (Internal Server Error) nếu có lỗi xóa
        http_response_code(500);
    }
} else {
    // Trả về mã HTTP 400 (Bad Request) nếu dữ liệu không hợp lệ hoặc thiếu thông tin productId
    http_response_code(400);
}
?>
