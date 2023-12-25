<div class="donhang">
            <table class="table-header">
                <tr>
                    <th style="width: 5%;background-color: yellow;">Mã đơn </th>
                    <th style="width: 7%;background-color: yellow;">Khách </th>
                    <th style="width: 10%;background-color: yellow;">Sản phẩm </th>
                    <th style="width: 5%;background-color: yellow;">Số lượng</th>
                    <th style="width: 7%;background-color: yellow;">Tổng tiền </th>
                    <th style="width: 20%;background-color: yellow;">Địa chỉ </th>
                    <th style="width: 10%;background-color: yellow;">Ngày giờ </th>
                    <th style="width: 10%;background-color: yellow;">Thanh toán </th>
                    <th style="width: 15%;background-color: yellow;">Lời nhắn</th>
                    <th style="width: 20%;background-color: yellow;">Trạng thái </th>
                    <th style="width: 20%;background-color: yellow;">Hành động</th>
                </tr>
                <?php
                require('../config/connect.php');
                mysqli_set_charset($conn, 'utf8');
                $sql = "SELECT * FROM orders ORDER BY order_date DESC"; 
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                     echo "<tr>
                        <td style='text-align: center;'>".$row['order_id']."</td>
                        <td style='text-align: center;'>".$row['oder_username']."</td> 
                        <td style='text-align: center;'>".$row['oder_prd']."</td> 
                        <td style='text-align: center;'>".$row['oder_quantity']."</td>
                        <td style='text-align: center;'>".$row['order_total']."</td>
                        <td style='text-align: center;'>".$row['order_address']."</td>
                        <td style='text-align: center;'>".$row['order_date']."</td>
                        <td style='text-align: center;'>".$row['type_pay']."</td>
                        <td style='text-align: center;'>".$row['order_status']."</td>
                        <td style='text-align: center;'>
                        <form action='mode.php?order=".$row['order_id']."' method='post'> 
                            <select name='status' style='border:none'>
                                <option value='".$row['trang_thai']."'>".$row['trang_thai']."</option> 
                                <option value='Đã duyệt'>Đã duyệt</option>
                                <option value='Đang vận chuyển'>Đang vận chuyển</option>
                                <option value='Giao hàng thành công'>Giao hàng thành công</option>
                            </select>
                            <input type='submit' style='color:red;border:none;background-color:#fff' value='Lưu'>     
                    </form>
                    </td>
                    <td style='text-align: center;'><a href='mode.php?delete_order=".$row['order_id']."'><i style='color:red;font-size:1.7em' class='fa fa-trash-o'></i></a></td>";

                   }
                     }
                ?>

              
            </table>

            <div class="table-content">
            </div>

           
        </div>