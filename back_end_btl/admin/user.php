<div class="khachhang">
    <?php
    require('../config/connect.php');
    mysqli_set_charset($conn, 'utf8');
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<table class='table-header'>
                <tr>
                    <th style='width: 15%;background-color: yellow;'>Tên đăng nhập</th>
                    <th style='width: 20%;background-color: yellow;'>Số điện thoại</th>
                    <th style='width: 20%;background-color: yellow;'>Mật khẩu</th>
                    <th style='width: 20%;background-color: yellow;'>Địa chỉ</th>
                    <th style='width: 10%;background-color: yellow;'>Hành động</th>
                    <th style='width: 10%;background-color: yellow;'>Xem giao dịch</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td class='text-center'>" . $row["username"] . "</td>
                    <td class='text-center'>" . $row["numberphone"] . "</td>
                    <td class='text-center'>" . $row["password"] . "</td>
                    <td class='text-center'>" . $row["address"] . "</td>
                    <td class='text-center'>
                        <div style='display:flex;justify-content:space-between;margin:2em'>
                            <button><a href='mode.php?updateuser=" . $row['username'] . "'><i style='color:blue;font-size:1.7em' class='fa fa-pencil'></i></a></button>
                            <button><a href='mode.php?deleteuser=" . $row['username'] . "'><i style='color:red;font-size:1.7em' class='fa fa-trash-o'></i></a></button>
                        </div>
                    </td>
                    <td class='text-center'><a href='view_transactions.php?username=" . $row['username'] . "'>Xem Chi Tiết</a></td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Không có dữ liệu khách hàng.";
    }
    $conn->close();
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

<!-- ... -->
