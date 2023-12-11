<?php
                    require('../config/connect.php');
                    mysqli_set_charset($conn,'utf8');
                    $sql="select * from products";
                    $ketqua = $conn->query($sql);
                 if ($ketqua->num_rows > 0) {
                    echo '<div id="category" class="col-lg-4 col-md-6 text-center';
                    if ($row['prd_category'] == 'Tráng Miệng') {
                        echo"<script>
                $(document).ready(function(){
                    $('#category').addClass('desert');
                });
                </script>";
                    } elseif ($row['prd_category'] == 'Đồ uống') {
                        echo"<script>
                        $(document).ready(function(){
                            $('#category').addClass('drinking');
                        });
                        </script>";
                    } elseif($row['prd_category'] == 'Đồ ăn') {
                        echo"<script>
                        $(document).ready(function(){
                            $('#category').addClass('food');
                        });
                        </script>";
                    }
                    // Nội dung khác ở đây
                    echo '</div>';
                    echo '<div class="single-product-item">
                        <div class="product-image">';
                        $path = '../admin/image/';
                        $img = $row['prd_img'];
                        $link = $path . '/' . $img;
                        echo '<a href="./product_detail.php?id=' . $row["prd_id"] . '"><img src="' . $link . '" alt=""></a>
                        </div>';

                       echo" <h3>".$row['prd_name']."</h3>";
                       echo' <div style="text-align: center; margin-bottom: 10px;">
                            <div class="product-price name-product" style="display: inline-block; margin-right: 10px; font-family: "Poppins", sans-serif;
                            font-size: 30px;
                            font-weight: 700;">'.$row["prd_price"].'</div>';
                        //     <div class="strike-price" style="display: inline-block; margin-right: 10px;"><strike>420.000đ</strike></div>
                        // </div>
                       echo' <p>Còn lại:'.$row["prd_quantity"].'</p>';
                      echo'  <button style=" font-family: "Poppins", sans-serif;
                        display: inline-block;
                        background-color: #F28123;
                        color: #fff;
                        padding: 10px 20px;border: none;border-radius: 2em;" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ Hàng</button>
                    </div>
                </div>';
                    }
               ?>