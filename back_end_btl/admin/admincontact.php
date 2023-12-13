<div class="khachhang">
            <?php
          require('../config/connect.php');
          mysqli_set_charset($conn, 'utf8');
          $sql = 'SELECT * FROM contact_info';
          $result = mysqli_query($conn, $sql);
          
          if ($result->num_rows > 0) { 
            echo"<table class='table-header'>
                <tr>
                    <!-- Theo độ rộng của table content -->
                    <th style='width: 15%'>Họ và tên </th>
                    <th style='width: 20%'>Email</th>
                    <th style='width: 20%'>Số điện thoại </th>
                    <th style='width: 20%'>Chủ đề </th>
                    <th style='width: 20%'>Lời nhắn</th>
                    <th style='width: 20%'>Thời gian</th>
                    <th style='width: 20%'>Chi tiết</th>
                    <th style='width: 10%'>Hành động</th>
                </tr>";
                while ($row = mysqli_fetch_assoc($result)) {// Thay đổi đường dẫn thư mục của bạn
                  
                    echo "<tr>
                            <td style='text-align:center'>" . $row["name"] . "</td>
                            <td style='text-align:center'>" . $row["email"] . "</td>
                            <td style='text-align:center'>" . $row["phone"] . "</td>
                            <td style='text-align:center'>" . $row["loinhan"] . "</td>
                            <td style='text-align:center'>" . $row["chitietloinhan"] . "</td>
                            <td style='text-align:center'>" . $row["created_at"] . "</td>
                            <td style='text-align:center'>" . $row["status"] . "</td>
                            <td style='text-align:center'>
                            <button><a  href='mode.php?updateuser=" . $row['username'] . "'><i style='color:blue;font-size:1.7em' class='fa fa-pencil'></i></a></button>
                        <button><a href='mode.php?deleteuser=" . $row['username'] . "'><i style='color:red;font-size:1.7em' class='fa fa-trash-o'></i></a></button>
                        </td>
                        
                          </tr>";
                }
                echo "</table>";
            }
            ?>
           

           