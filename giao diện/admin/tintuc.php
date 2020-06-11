<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - Thông tin khách hàng</title>
    <link rel="stylesheet" href="thongtinkh.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <form action="" method="post">
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
                        <center>
                            <p>DANH SÁCH TIN TỨC</p>
                        </center>

                        <div class="text">

                            <a href="themtintuc.php">Thêm tin</a>
                            <table border="1px">
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên tin tức</th>
                                    <th>Ngày đăng</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                                $sql = "select * from tintuc";
                                $result = $conn->query($sql);
                                foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td id="img">
                                        <img src="../control/<?php echo $row['image']; ?>" width="140px" height="83px"
                                            alt="">
                                    </td>
                                    <td id="tentintuc">
                                        <p><?php echo $row['Tentintuc']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['Ngaydang']; ?></p>
                                    </td>
                                    <td id="center"><a href="themtintuc.php?matt=<?php echo $row['Matintuc'] ?>">Sửa</a>
                                    </td>
                                    <td id="center"><a href="xoatin.php?id=<?php echo $row['Matintuc'] ?>">Xóa</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>