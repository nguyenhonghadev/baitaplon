<div class="donhang">
            <table class="table-header">
                <tr>
                    <th style="width: 10%;background-color: yellow;">Mã bài viết </th>
                    <th style="width: 12%;background-color: yellow;">Tên bài viết </th>
                    <th style="width: 30%;background-color: yellow;">Nội dung bài viết</th>
                    <th style="width: 10%;background-color: yellow;">Ảnh 1</th>
                    <th style="width: 10%;background-color: yellow;">Ảnh 2</th>
                    <th style="width: 10%;background-color: yellow;">Ảnh 3</th>
                    <th style="width: 15%;background-color: yellow;">Trạng thái</th>
                    <th style="width: 15%;background-color: yellow;">Hành động</th>
                </tr>
                <?php
                require('../config/connect.php');
                mysqli_set_charset($conn, 'utf8');
                $sql = "SELECT * FROM abouts  BY about_date DESC"; 
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                     echo "<tr>
                        <td style='text-align: center;'>".$row['about_id']."</td>
                        <td style='text-align: center;'>".$row['oder_title']."</td> 
                        <td style='text-align: center;'>".$row['oder_detail']."</td> 
                        <td style='text-align: center;'>".$row['oder_img1']."</td>
                        <td style='text-align: center;'>".$row['about_img2']."</td>
                        <td style='text-align: center;'>".$row['about_img3']."</td>
                        <td style='text-align: center;'>".$row['trang_thai']."</td>
                        

                   

                    <td style='text-align: center;'>
                    <a href='mode.php?delete_about=".$row['about_id']."'>
                        <i style='color:red;font-size:1.2em;text-align:center' class='fa fa-trash-o'></i>
                    </a>            
                </td>
                                    ";
                   }
                }
                    ?>

            </table>

            <div class="table-content">
                
            </div>

            <button onclick="toggleContainer()">
            <i class="fa fa-plus-square"></i>
            Thêm bài viết
        </button>
        </div>


    <div class="container">
    <p style="margin-left: 99%; cursor: pointer;" onclick="hideContainer()">X</p>
        <form action="about.php" method="post">
            <div class="image-inputs">
                <div class="image-upload">
                    <label for="image1" class="image-label"><i class="fas fa-cloud-upload-alt""></i>Hình ảnh 1</label>
                    <input type="file" id="image1" name="image1">
                </div>
                <div class="image-upload">
                    <label for="image2" class="image-label"><i class="fas fa-cloud-upload-alt""></i>Hình ảnh 2</label>
                    <input type="file" id="image2" name="image2">
                </div>
                <div class="image-upload">
                    <label for="image3" class="image-label"><i class="fas fa-cloud-upload-alt""></i>Hình ảnh 3</label>
                    <input type="file" id="image3" name="image3">
                </div>
            </div>

            <label for="title">Tiêu đề bài viết:</label>
            <input type="text" id="title" name="title">

            <label for="content">Nội dung bài viết:</label>
            <textarea id="content" name="content" rows="6"></textarea>

            <input type="submit" value="Đăng bài">
        </form>
    </div>
    <?php
if (
    isset($_POST['title']) &&
    isset($_POST['content']) &&
    isset($_FILES['image1']) &&
    isset($_FILES['image2']) &&
    isset($_FILES['image3'])
) {
    require('../config/connect.php'); 
    require('../page/function.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    $target_dir = 'image/';

    $imageNames = []; // Mảng để lưu tên các tệp ảnh

    // Loop through the images
    for ($i = 1; $i <= 3; $i++) {
        $fileKey = 'image' . $i;
        $target_file = $target_dir . basename($_FILES[$fileKey]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES[$fileKey]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $target_file)) {
                // Lưu tên tệp ảnh vào mảng $imageNames
                $imageNames[] = basename($_FILES[$fileKey]["name"]);
            } else {
                // Handle the failure to move the file
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Handle if the uploaded file is not an image
            echo "File is not an image.";
        }
    }

    // Lưu tên các tệp ảnh vào cơ sở dữ liệu
    if (!empty($imageNames)) {
        // Chuyển mảng thành một chuỗi để lưu vào cơ sở dữ liệu
        $imageNamesStr = implode(",", $imageNames);

        // Thực hiện truy vấn SQL để lưu tên tệp ảnh vào cơ sở dữ liệu
        // Ví dụ sử dụng PDO và prepared statement
        $stmt = $pdo->prepare("INSERT INTO image_table (title, content, image_names) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $imageNamesStr]);
        // Thay đổi 'image_table' thành tên bảng thực tế của bạn và điều chỉnh tên cột nếu cần

        echo "Images uploaded and file names saved to the database.";
    }
}
?>



