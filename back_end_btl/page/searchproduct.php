<section class="donmoi">
                <h2>Chờ xác nhận</h2>
                <ul class="accept_order">
                    <li>
                        <?php
                        $useroder=$_SESSION['username'];
                        require('../config/connect.php');
                        mysqli_set_charset($conn, 'utf8');
                        $sql_temp="select * from order where trạng thái = 'Đơn mới'";
                        $result_temp= $conn->query($sql_temp);
                        if ($result_temp->num_rows >0)
                            while($row=$result_temp->fetch_assoc()){
                                echo"<script>alert('id = ".$row['oder_prd']."')</script>";
                        
                            }
                        // $sqlnew="SELECT orders.oder_prd, orders.order_date, orders.oder_quantity, orders.order_total, products.prd_img, products.prd_price
                        // FROM orders
                        // JOIN products ON orders.oder_prd = products.prd_name
                        // WHERE orders.oder_prd = 
                        // ORDER BY orders.order_date DESC";
                        // $resultnew = $conn->query($sql);
                       
                        ?>
                  
                            <!-- <img src="../image/tráng miệng/cam.jpg" alt="Tên sản phẩm">
                            <div class="order_details">
                                <div class="order_details">
                                    <h6 class="product">Tên sản phẩm</h6>
                                    <div class="details">
                                        <p class="price">Giá: 200000đ</p>
                                        <p class="quantity">x1</p>
                                        <p class="total">Thành tiền:200000đ</p>
                                    </div>
                                    <p class="time">Thời gian</p><button style="border: none;width: 3em;margin-left: 80%;"><a href="#">Hủy</a></button>
                                </div>
                            </div>
                        </div> -->
                </li>
            </ul>
            </section>