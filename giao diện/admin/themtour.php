<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - Thêm tour</title>
    <link rel="stylesheet" href="themtour.css">
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
                        if (isset($_GET['id'])) {
                            $isNew = false;
                            $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                            $sql = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem where matour=" . $_GET['id'];
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo "<center>
                            <p>SỬA TOUR</p>
                        </center>";
                        } else {
                            $isNew = true;
                            echo " <center>
                            <p>THÊM TOUR MỚI</p>
                        </center>";
                        }

                        ?>

                        <div class="text">
                            <p>Tên tour</p>
                            <input type="text" name="tentour" value='<?php if (isset($_GET["id"])) {
                                                                            echo $row["Tentour"];
                                                                        } ?>'><br>
                            <p>Loại tour</p>
                            <select name="select" id="">
                                <option value="">--Chọn--</option>
                                <option value="1" selected="selected">Trong nước</option>
                                <option value="2">Nước ngoài</option>
                            </select>
                            <span><?php if (isset($a)) {
                                        echo $a;
                                    } ?></span>

                            <p>Địa chỉ</p>
                            <input type="text" name="diachi" value="<?php if (isset($_GET["id"])) {
                                                                        echo $row["Diachi"];
                                                                    } ?>" id=""><br>
                            <p>Tên địa điểm</p>
                            <input type="text" name="tendiadiem" value="<?php if (isset($_GET["id"])) {
                                                                            echo $row["Tendiadiem"];
                                                                        } ?>" id=""><br>
                            <p>Ảnh giật gân</p>
                            <input type="file" name="image" id=""><br>
                            <p>Loại địa điểm</p>
                            <input type="text" name="loaidiadiem" value="<?php if (isset($_GET["id"])) {
                                                                                echo $row["Loaidiadiem"];
                                                                            } ?>" id=""><br>
                            <fieldset>
                                <legend> giá </legend>
                                <table>
                                    <tr>
                                        <td> <span>Người lớn</span></td>
                                        <td><input type="number" value="<?php if (isset($_GET["id"])) {
                                                                            echo $row["Giatiennguoilon"];
                                                                        } ?>" name="giatiennguoilon" id="prince"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Trẻ em</span></td>
                                        <td><input type="number" value="<?php if (isset($_GET["id"])) {
                                                                            echo $row["Giatientreem"];
                                                                        } ?>" name="giatientreem" id="prince"><br></td>
                                    </tr>
                                    <tr>
                                        <td><span>Em bé</span></td>
                                        <td><input type="number" name="giatienembe" value="<?php if (isset($_GET["id"])) {
                                                                                                echo $row["Giatienembe"];
                                                                                            } ?>" id="prince"><br></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <p>Ngày</p>
                            <input type="date" name="date"  value="<?php if (isset($_GET["id"])) {
                                                                                            echo $row["Ngaykhoihanh"];
                                                                                        } ?>" id=""><br>

                            <p>Chi tiết địa điểm</p>
                            <textarea name="ctdd" id="cknoidung" cols="30" rows="10"><?php if (isset($_GET["id"])) {
                                                                                            echo $row["Chitietdiadiem"];
                                                                                        } ?></textarea>
                            <script type="text/javascript">
                            CKEDITOR.replace("cknoidung");
                            </script>
                            <input type="submit" name="up" value="Thêm nội dung">
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
            move_uploaded_file($tmp_name, "../control/imgdiadiem/" . $file_name);
            $anh = "../control/imgdiadiem/" . $file_name;
        }

        $conn = new mysqli('localhost', 'root', '', 'detaiphp');
        if ($isNew == true) {
            $sql = "INSERT INTO `diadiem`(`Diachi`, `Tendiadiem`, `Loaidiadiem`, `Giatiennguoilon`, `Giatientreem`, `Giatienembe`, `Chitietdiadiem`,`image`) 
            VALUES ('" . $_POST['diachi'] . "','" . $_POST['tendiadiem'] . "','" . $_POST['loaidiadiem'] . "','" . $_POST['giatiennguoilon'] . "','" . $_POST['giatientreem'] . "','" . $_POST['giatienembe'] . "','" . $_POST['ctdd'] . "','" . $anh . "')";
            $conn->query($sql);
            $sqlma = "select * from diadiem where diachi='" . $_POST['diachi'] . "' and chitietdiadiem='" . $_POST['ctdd'] . "'";
            $result2 = $conn->query($sqlma);
            $sql2 = '';
            foreach ($result2 as $row2) {
                $sql2 = "INSERT INTO `tour`(`Tentour`, `Madiadiem`, `Maloaitour`, `Ngaykhoihanh`) VALUES ('" . $_POST['tentour'] . "','" . $row2['Madiadiem'] . "','" . $_POST['select'] . "','" . $_POST['date'] . "')";
            }
            $conn->query($sql2);
        } else {
            $sql = "UPDATE `tour` SET `Tentour`='" . $_POST['tentour'] . "',`Maloaitour`='" . $_POST['select'] . "',`Ngaykhoihanh`='" . $_POST['date'] . "' WHERE matour=" . $_GET['id'];
            $conn->query($sql);
            $sqlma = "select * from tour where tentour='" . $_POST['tentour'] . "' and Ngaykhoihanh='" . $_POST['date'] . "'";
            $result2 = $conn->query($sqlma);
            $sql2 = '';
            foreach ($result2 as $row2) {
                $sql2 = "UPDATE `diadiem` SET `Diachi`='" . $_POST['diachi'] . "',`Tendiadiem`='" . $_POST['tendiadiem'] . "',`Loaidiadiem`='" . $_POST['loaidiadiem'] . "',`Giatiennguoilon`='" . $_POST['giatiennguoilon'] . "',`Giatientreem`='" . $_POST['giatientreem'] . "',`Giatienembe`='" . $_POST['giatienembe'] . "',`Chitietdiadiem`='" . $_POST['ctdd'] . "',`image`='" . $anh . "' WHERE Madiadiem=" . $row2['Madiadiem'];
            }
            $conn->query($sql2);
        }
        $conn->close();
    }
    ?>
</body>

</html>