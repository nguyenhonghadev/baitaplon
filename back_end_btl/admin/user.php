<div class="khachhang">
            <?php
          require('../config/connect.php');
          mysqli_set_charset($conn, 'utf8');
          $sql = 'SELECT * FROM users';
          $result = mysqli_query($conn, $sql);
          
          if ($result->num_rows > 0) { 
            echo"<table class='table-header'>
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th style='width: 15%'>Tên đăng nhập </th>
                    <th style='width: 20%'>Số điện thoại </th>
                    <th style='width: 20%'>Mật khẩu </th>
                    <th style='width: 20%'>Địa chỉ</th>
                    <th style='width: 10%'>Hành động</th>
                </tr>";
                while ($row = mysqli_fetch_assoc($result)) {// Thay đổi đường dẫn thư mục của bạn
                  
                    echo "<tr>
                            <td style='text-align:center'>" . $row["username"] . "</td>
                            <td style='text-align:center'>" . $row["password"] . "</td>
                            <td style='text-align:center'>" . $row["numberphone"] . "</td>
                            <td style='text-align:center'>" . $row["address"] . "</td>
                            <td style='text-align:center'>
                            <button><a  href='mode.php?update=" . $row['username'] . "'><i style='color:blue;font-size:1.7em' class='fa fa-pencil'></i></a></button>
                        <button><a href='mode.php?delete=" . $row['username'] . "'><i style='color:red;font-size:1.7em' class='fa fa-trash-o'></i></a></button>
                        </td>
                        
                          </tr>";
                }
                echo "</table>";
            }
            ?>
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
            <form method="post" action="admin.php">
            <table class="overlayTable table-outline table-content table-header">
                <tr>
                    <th colspan="2">Thêm Người Dùng</th>
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
            </form>
        </div>