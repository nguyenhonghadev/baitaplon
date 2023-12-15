<?php
require('../config/connect.php');
mysqli_set_charset($conn, 'utf8');
$sql = 'SELECT * FROM sp_noibat';
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<table class='table-header'>
            <tr>
                <!-- Theo độ rộng của table content -->
                <th style='width: 20%;background-color: yellow;'>Mã Sản Phẩm </th>
                <th style='width: 25%;background-color: yellow;'>Tên sản Phẩm </th>
                <th style='width: 20%;background-color: yellow;'>Hình ảnh</th>
                <th style='width: 15%;background-color: yellow;'>Giá</th>
                <th style='width: 20%;background-color: yellow;'>Hành động</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $img_sp = $row['sp_image'];
        $img_path = 'image/' . $img_sp; // Thay đổi đường dẫn thư mục của bạn

        echo "<tr>
                <td style='text-align:center'>" . $row["sp_id"] . "</td>
                <td style='text-align:center'>" . $row["sp_name"] . "</td>
                <td class='img-sp' style='text-align: center;'><img src='" . $img_path . "' alt='Ảnh sản phẩm' style='width: 90%; height: 70%; display: inline-block;'></td>
                <td style='text-align:center'>" . $row["sp_price"] . "</td>
                <td style='text-align:center'>
                    <button style='margin:0 auto'><a href='mode.php?deletenb=" . $row['sp_id'] . "'><i style='color:red;font-size:1.7em' class='fa fa-trash-o'></i></a></button>
                </td>
              </tr>";
    }

    echo "</table>";
}
?>

