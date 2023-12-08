<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "<script>window.location.href = 'loginadmin.php';</script>";
    exit();
}



?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin -HK restaurant</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <!-- Our files -->
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <header>
        <h1>HK Restaurant</h1>
    </header>

    <!-- Menu -->
    <aside class="sidebar">
        <ul class="nav">
            <li class="nav-title">MENU</li>
            <li class="nav-item"><a class="nav-link active"><i class="fa fa-home"></i> Trang Chủ</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-th-large"></i> Sản Phẩm</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-file-text-o"></i> Đơn Hàng</a></li>
            <li class="nav-item"><a class="nav-link"><i class="fa fa-address-book-o"></i> Khách Hàng</a></li>
            <li class="nav-item">
                <hr>
            </li>
            <li class="nav-item">
    <a href="logout.php" class="nav-link">
        <i class="fa fa-arrow-left"></i> Đăng xuất (về Trang chủ)
    </a>
</li>

        </ul>
    </aside>

    <!-- Khung hiển thị chính -->
    <div class="main">
        <div class="home">
            <div class="canvasContainer">
                <canvas id="myChart1"></canvas>
            </div>

            <h1 style="text-align: center;"> Chúc Bạn Một Ngày Tốt Lành!!!!</h1>
            <div class="canvasContainer">
                <canvas id="myChart2"></canvas>
            </div>

            <div class="canvasContainer">
                <canvas id="myChart3"></canvas>
            </div>

            <div class="canvasContainer">
                <canvas id="myChart4"></canvas>
            </div>
        </div>

        <!-- Sản Phẩm -->
        <div class="sanpham">

            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th style="width: 10%">Mã Sản Phẩm </th>
                    <th style="width: 15%">Tên sản Phẩm </th>
                    <th style="width: 25%">Mô tả</th>
                    <th style="width: 10%">số lượng</th>
                    <th style="width: 15%">Hình ảnh</th>
                    <th style="width: 10%">Giá</th>
                    <th style="width: 15%">Hành động</th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <select name="kieuTimSanPham">
                    <option value="ma">Tìm theo mã</option>
                    <option value="ten">Tìm theo tên</option>
                </select>
                <input type="text" placeholder="Tìm kiếm...">
                <button onclick="document.getElementById('khungThemSanPham').style.transform = 'scale(1)';">
                    <i class="fa fa-plus-square"></i>
                    Thêm sản phẩm
                </button>
            </div>
            <div id="khungThemSanPham" class="overlay">
                <span class="close" onclick="this.parentElement.style.transform = 'scale(0)';">&times;</span>
                <table class="overlayTable table-outline table-content table-header">
                    <tr>
                        <th colspan="2">Thêm Sản Phẩm</th>
                    </tr>
                    <tr>
                        <td>Mã sản phẩm:</td>
                        <td><input type="text" name="masp" id="maspThem" required></td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm:</td>
                        <td><input type="text" name="tensp" required></td>
                    </tr>
                    <tr>
                        <td>Ảnh sản phẩm</td>
                        <td><input type="file" name="anhsp" required></td>
                    </tr>
                    <tr>
                        <td>Mô tả sản phẩm:</td>
                        <td><textarea style="height: 5em;" name="motasp" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Số lượng:</td>
                        <td><input type="text" name="soluongsp" required></td>
                    </tr>
                    <tr>
                        <td>Giá:</td>
                        <td><input type="text" name="giasp" required></td>
                    </tr>
                    <tr>
                        <td>Loại hàng hóa</td>
                        <td>
                            <select name="chonCompany">
                                <option value="Apple">Đồ Ăn</option>
                                <option value="Samsung">Đồ Uống</option>
                                <option value="Oppo">Đồ Tráng Miệng</option>
                                <!-- Các option khác -->
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="table-footer"> <input type="submit" style="width: 10em;height: 3em;background-color:  #F28123;color: white;" value="Thêm sản phẩm"> </td>
                    </tr>
                </table>
            </div>
            <div id="khungSuaSanPham" class="overlay"></div>
        </div>

        <!-- // sanpham -->


        <!-- Đơn Hàng -->
        <div class="donhang">
            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th style="width: 5%">Stt </th>
                    <th style="width: 13%">Mã đơn </th>
                    <th style="width: 7%">Khách </th>
                    <th style="width: 20%">Sản phẩm </th>
                    <th style="width: 15%">Tổng tiền </th>
                    <th style="width: 10%">Ngày giờ </th>
                    <th style="width: 10%">Trạng thái </th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <div class="timTheoNgay">
                    Từ ngày: <input type="date"> Đến ngày: <input type="date">

                    <button><i class="fa fa-search"></i> Tìm</button>
                </div>

                <select name="kieuTimDonHang">
                    <option value="ma">Tìm theo mã đơn</option>
                    <option value="khachhang">Tìm theo tên khách hàng</option>
                    <option value="trangThai">Tìm theo trạng thái</option>
                </select>
                <input type="text" placeholder="Tìm kiếm...">
            </div>
        </div>

        <!-- // don hang -->


        <!-- Khách hàng -->
        <div class="khachhang">
            <table class="table-header">
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th style="width: 5%">Stt </th>
                    <th style="width: 15%">Tên đăng nhập </th>
                    <th style="width: 20%">Số điện thoại </th>
                    <th style="width: 20%">mật khẩu </th>
                    <th style="width: 10%">Hành động</th>
                </tr>
            </table>

            <div class="table-content">
            </div>

            <div class="table-footer">
                <select name="kieuTimKhachHang">
                    <option value="ten">Tìm theo họ tên</option>
                    <option value="email">Tìm theo email</option>
                    <option value="taikhoan">Tìm theo tài khoản</option>
                </select>
                <input type="text" placeholder="Tìm kiếm...">
                <button onclick="document.getElementById('khungThemKhachHang').style.display = 'block'">
                    <i class="fa fa-plus-square"></i>
                    Thêm Người Dùng
                </button>
            </div>
        </div>

        <div id="khungThemKhachHang" style="display: none;" class="adduser">

            <table class="overlayTable table-outline table-content table-header">
                <tr>
                    <th colspan="2">Thêm Người Dùng</th>
                </tr>
                <tr>
                    <td>UID:</td>
                    <td><input type="text" id="UID" required></td>
                </tr>
                <tr>
                    <td>Tên Đăng Nhập:</td>
                    <td><input type="text" required></td>
                </tr>
                <tr>
                    <td>Mật Khẩu:</td>
                    <td><input type="text" style="height: 5em;" required></input>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" required></td>
                </tr>
                <tr>
                    <td>Số Điện Thoại:</td>
                    <td><input type="text" required></td>
                </tr>


                <tr>
                    <td colspan="2" class="table-footer"><button style="width: 5em;border-radius:0.3em; height: 3em;background-color:  #F28123;color: white;" onclick="document.getElementById('khungThemKhachHang').style.display='none'">Hủy</button> <input type="submit" style="width: 10em;height: 3em;background-color:  #F28123;color: white;"
                            value="Thêm Người Dùng"> </td>
                </tr>
            </table>
        </div>


        <footer>

        </footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('.main > div');

        // Hàm ẩn tất cả các phần tử
        function hideAllSections() {
            sections.forEach(section => {
                section.style.display = 'none';
            });
        }

        // Hàm xử lý khi nhấn vào các mục menu
        navLinks.forEach((link, index) => {
            link.addEventListener('click', function() {
                // Ẩn tất cả các phần tử
                hideAllSections();

                // Xóa lớp 'active' khỏi tất cả các mục menu
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Thêm lớp 'active' cho mục được nhấn
                this.classList.add('active');

                // Hiển thị phần tử tương ứng với mục menu được nhấn
                sections[index].style.display = 'block';
            });
        });

        // Hiển thị trang chủ mặc định khi tải trang
        sections[0].style.display = 'block';
        navLinks[0].classList.add('active');
    });
</script>


</html>