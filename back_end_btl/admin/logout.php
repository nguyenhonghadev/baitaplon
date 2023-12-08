<?php
// Bắt đầu phiên làm việc
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Nếu có cookie phiên, hủy bỏ cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}

// Hủy bỏ phiên
session_destroy();

// Chuyển hướng về trang chủ hoặc trang đăng nhập
header("Location:admin.php"); // Điều hướng về trang chủ sau khi đăng xuất
exit;
?>
