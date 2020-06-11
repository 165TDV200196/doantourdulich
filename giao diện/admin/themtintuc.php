<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - Tin tức</title>
    <link rel="stylesheet" href="themtintuc.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <?php
            include 'menu.php'
            ?>
            <div class="content">
                <?php
                include 'header.php'
                ?>
                <div class="box">
                    <div class="content-box">
                        <?php
                        if (isset($_GET['matt'])) {
                            $isNew = false;
                            $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                            $sql = "select * from tintuc where matintuc=" . $_GET['matt'];
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $conn->close();
                            echo "<center>
                            <p>SỬA TIN TỨC</p>
                        </center>";
                        } else {
                            $isNew = true;
                            echo "<center>
                            <p>THÊM TIN TỨC MỚI</p>
                        </center>";
                        }
                        ?>
                        <div class="text">
                            <p>Tiêu đề</p>
                            <input type="text" name="tieude" value="<?php if (isset($_GET['matt'])) {
                                                                        echo $row["Tentintuc"];
                                                                    } ?>" id=""><br>
                            <p>Ngày</p>
                            <input type="date" name="ngaydang" value="<?php if (isset($_GET['matt'])) {
                                                                            echo $row['Ngaydang'];
                                                                        } ?>" id=""><br>
                            <p for="">Ảnh giật gân</p>
                            <input type="file" name="image" id=""><br>
                            <p for="">Tóm tắt</p>
                            <textarea name="cktt" id="cktomtat" cols="30" rows="10"><?php if (isset($_GET['matt'])) {
                                                                                        echo $row['Tomtat'];
                                                                                    } ?></textarea>
                            <p for="">Nội dung</p>
                            <textarea name="cknd" id="cknoidung" cols="30" rows="10"><?php if (isset($_GET['matt'])) {
                                                                                            echo $row['Noidung'];
                                                                                        } ?></textarea>
                            <script type="text/javascript">
                            CKEDITOR.replace("cknoidung");
                            CKEDITOR.replace("cktomtat");
                            </script>
                            <input type="submit" name="up" value="Cập nhật">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['up'])) {
        $anh = '';
        if (isset($_FILES['image'])) {
            $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $ext = explode(".", $file_name);
            $file_ext = strtolower(end($ext));
            $arr_ext = array('jpg', 'png');
            if (!in_array($file_ext, $arr_ext)) {
                echo "File ko đúng định dạng";
                exit();
            }
            move_uploaded_file($tmp_name, "../control/imgtintuc/" . $file_name);
            $anh = "../control/imgtintuc/" . $file_name;
        }
        $conn = new mysqli('localhost', 'root', '', 'detaiphp');
        if ($isNew == true) {
            $sql = "insert into `tintuc`(`Tentintuc`, `Noidung`, `Ngaydang`, `image`,Tomtat) values ('" . $_POST['tieude'] . "','" . $_POST['cknd'] . "','" . $_POST['ngaydang'] . "','" . $anh . "',N'" . $_POST['cktt'] . "')";
        } else {
            $sql = "UPDATE `tintuc` SET `Tentintuc`='" . $_POST['tieude'] . "',`Noidung`='" . $_POST['cknd'] . "',`Ngaydang`='" . $_POST['ngaydang'] . "',`image`='" . $anh . "',Tomtat='" . $_POST['cktt'] . "' WHERE Matintuc=" . $_GET['matt'];
        }
        $conn->query($sql);
        $conn->close();
    }
    ?>
</body>

</html>