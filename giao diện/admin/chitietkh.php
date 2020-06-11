<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - Thông tin khách hàng</title>
    <link rel="stylesheet" href="chitietkh.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>


<body>
    <form action="" method="post">
        <div class="container">
            <?php
            include 'menu.php';

            ?>
            <div class="content">
                <?php
                include 'header.php'
                ?>
                <div class="box">
                    <div class="content-box">
                        <center>
                            <p>CHI TIẾT KHÁCH HÀNG</p>
                        </center>

                        <div class="text">
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                            $sql = "select * from khachhang where makhachhang=" . $_GET['makh'];
                            $result = $conn->query($sql);
                            foreach ($result as $row) {
                            ?>
                            <table>
                                <tr>
                                    <td id="id"><strong>Mã khách hàng:</strong></td>
                                    <td><span><?php echo $row['Makhachhang']; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tên khách hàng:</strong></td>
                                    <td><span><?php echo $row['tenkhachhang']; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Username:</strong></td>
                                    <td><span><?php echo $row['Username']; ?></span></td>

                                </tr>

                                <tr>
                                    <td><strong>Password:</strong></td>
                                    <td><span><?php echo $row['Password']; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Giới tính</strong></td>
                                    <td><span>
                                            <?php
                                                if ($row['Gioitinh'] == 1) {
                                                    echo "Nam";
                                                } else {
                                                    echo "Nữ";
                                                } ?>
                                        </span></td>
                                </tr>
                                <tr>
                                    <td><strong>Điện thoại:</strong></td>
                                    <td><span><?php echo $row['phone']; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>CMND:</strong></td>
                                    <td><span><?php echo $row['CMND']; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Năm sinh:</strong></td>
                                    <td><span><?php echo $row['Namsinh']; ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Ghi chú:</strong></td>
                                    <td> <span><?php echo $row['Ghichu']; ?></span></td>
                                </tr>
                            </table>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>