<div class="donhang">
<<<<<<< HEAD
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
                $sql = "SELECT * FROM abouts  BY about_time DESC"; 
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
                        

                   

=======
    <table class="table-header">
        <tr>
            <th style="width: 10%;background-color: yellow;">Mã bài viết</th>
            <th style="width: 12%;background-color: yellow;">Tên bài viết</th>
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
        $sql = "SELECT * FROM abouts ORDER BY about_id DESC"; 
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td style='text-align: center;'>".$row['about_id']."</td>
                    <td style='text-align: center;'>".$row['about_title']."</td> 
                    <td style='text-align: center;'>".$row['about_detail']."</td> 
                    <td style='text-align: center;'>".$row['about_img1']."</td>
                    <td style='text-align: center;'>".$row['about_img2']."</td>
                    <td style='text-align: center;'>".$row['about_img3']."</td>
                    <td style='text-align: center;'>".$row['trang_thai']."</td>
>>>>>>> bd579b7b9f41a263464a9d33869cb57c1490bfa9
                    <td style='text-align: center;'>
                        <a href='mode.php?delete_about=".$row['about_id']."'>
                            <i style='color:red;font-size:1.2em;text-align:center' class='fa fa-trash-o'></i>
                        </a>            
                    </td>
                </tr>";
            }
        }
        ?>
    </table>

    <div class="table-content"></div>

    <button onclick="toggleContainer()">
        <i class="fa fa-plus-square"></i> Thêm bài viết
    </button>
</div>

<div class="container">
    <p style="margin-left: 99%; cursor: pointer;" onclick="hideContainer()">X</p>
    <form action="about.php" method="post" enctype="multipart/form-data">
        <div class="image-inputs">
            <div class="image-upload">
                <label for="image1" class="image-label"><i class="fas fa-cloud-upload-alt"></i>Hình ảnh 1</label>
                <input type="file" id="image1" name="image1">
            </div>
            <div class="image-upload">
                <label for="image2" class="image-label"><i class="fas fa-cloud-upload-alt"></i>Hình ảnh 2</label>
                <input type="file" id="image2" name="image2">
            </div>
            <div class="image-upload">
                <label for="image3" class="image-label"><i class="fas fa-cloud-upload-alt"></i>Hình ảnh 3</label>
                <input type="file" id="image3" name="image3">
            </div>
        </div>

        <label for="title">Tiêu đề bài viết:</label>
        <input type="text" id="title" name="title">

<<<<<<< HEAD
    <div class="container">
    <p style="margin-left: 99%; cursor: pointer;" onclick="hideContainer()">X</p>
    <form action="admin.php?quanly=baiviet" method="post" enctype="multipart/form-data">
    <div class="image-inputs">
        <div class="image-upload">
            <label for="image1" class="image-label"><i class="fas fa-cloud-upload-alt"></i>Hình ảnh 1</label>
            <input type="file" id="image1" name="image1" onchange="displayMessage('image1', this)">
            <div id="image1-message" class="upload-message"></div>
        </div>
        <div class="image-upload">
            <label for="image2" class="image-label"><i class="fas fa-cloud-upload-alt"></i>Hình ảnh 2</label>
            <input type="file" id="image2" name="image2" onchange="displayMessage('image2', this)">
            <div id="image2-message" class="upload-message"></div>
        </div>
        <div class="image-upload">
            <label for="image3" class="image-label"><i class="fas fa-cloud-upload-alt"></i>Hình ảnh 3</label>
            <input type="file" id="image3" name="image3" onchange="displayMessage('image3', this)">
            <div id="image3-message" class="upload-message"></div>
        </div>
    </div>
            <label for="title">Tiêu đề bài viết:</label>
            <input type="text" id="title" name="title">
=======
        <label for="content">Nội dung bài viết:</label>
        <textarea id="content" name="content" rows="6"></textarea>

        <input type="submit" value="Đăng bài">
    </form>
</div>
>>>>>>> bd579b7b9f41a263464a9d33869cb57c1490bfa9

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

    // Xử lý và lấy dữ liệu từ biểu mẫu
    $title = $_POST['title'];
    $content = $_POST['content'];
<<<<<<< HEAD
    $target_dir = '../image/';
    $trang_thai='Hiển Thị';
    $imageNames = [];
=======

    // Xử lý ảnh và lấy tên các tệp ảnh
    $imageNames = handleImages($_FILES);

    // Thêm dữ liệu vào bảng abouts
    $sql = "INSERT INTO abouts (about_title, about_detail, about_img1, about_img2, about_img3) 
            VALUES ('$title', '$content', '$imageNames[0]', '$imageNames[1]', '$imageNames[2]')";

    if (mysqli_query($conn, $sql)) {
        echo "Dữ liệu đã được chèn thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Hàm xử lý ảnh và trả về một mảng chứa tên các tệp ảnh
function handleImages($files)
{
    $target_dir = 'image/';
    $imageNames = [];

    // Loop through the images
>>>>>>> bd579b7b9f41a263464a9d33869cb57c1490bfa9
    for ($i = 1; $i <= 3; $i++) {
        $fileKey = 'image' . $i;
        $target_file = $target_dir . basename($files[$fileKey]["name"]);

<<<<<<< HEAD
        $check = getimagesize($_FILES[$fileKey]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $target_file)) {
                $imageNames[] = basename($_FILES[$fileKey]["name"]);
            } else {
                echo "Xin lỗi đã xảy ra lỗi, Vui lòng thử lại.";
                exit; 
            }
        } else {
            echo "File không phải ảnh.";
            exit; 
        }
    }

    if (!empty($imageNames)) {
        $about_id = generateRandomString(); 
        $sql = "INSERT INTO abouts (`about_id`, `about_img1`, `about_img2`, `about_img3`, `about_title`, `about_detail`, `trang_thai`) 
        VALUES ('$about_id', '$imageNames[0]', '$imageNames[1]', '$imageNames[2]', '$title', '$content', '$trang_thai')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            echo "<script>alert('Đã đăng bài thành công!!')</script>";
            echo "<script>window.location.href='admin.php?quanly=baiviet'</script>";
        } else {
            echo "<script>alert('Lỗi!!')</script>";
            echo "<script>window.location.href='admin.php?quanly=baiviet'</script>";
        }
    }
=======
        // Move the uploaded file to the target directory
        if (move_uploaded_file($files[$fileKey]["tmp_name"], $target_file)) {
            // Lưu tên tệp ảnh vào mảng $imageNames
            $imageNames[] = basename($files[$fileKey]["name"]);
        } else {
            // Handle the failure to move the file
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return $imageNames;
>>>>>>> bd579b7b9f41a263464a9d33869cb57c1490bfa9
}
?>
