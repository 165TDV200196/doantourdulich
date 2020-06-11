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
                            <p>DANH SÁCH KHÁCH HÀNG</p>
                        </center>

                        <div class="text">
                            <table border="1px">
                                <tr>
                                    <th>Họ và tên</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Xem thông tin</th>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                                $sql = "select * from khachhang";
                                $result = $conn->query($sql);
                                foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <p><?php echo $row['tenkhachhang']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['Username']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['Password']; ?></p>
                                    </td>
                                    <td id="center"><a href="chitietkh.php?makh=<?php echo $row['Makhachhang']; ?>">chi
                                            tiết</a></td>
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