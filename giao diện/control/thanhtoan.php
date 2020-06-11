<!DOCTYPE html>
<html lang="en">
<!-- https://tour.dulichvietnam.com.vn/dat-tour.html/2342 -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="thanhtoan.css">
</head>

<body>
    <div class="container">
        <?php
        include 'menu.php';
        $conn = new mysqli('localhost', 'root', '', 'detaiphp');
        if (isset($_GET['id'])) {
            $isNew = false;
            $sql = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem where matour=" . $_GET['id'];
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>
        <div class="content">
            <div class="box">
                <div class="box-tour">
                    <p>Đơn đặt tour</p>
                    <hr>
                    <div class="img">
                        <img src="<?php if (isset($_GET["id"])) {
                                        echo $row["image"];
                                    } ?>" alt="">
                    </div>
                    <div class="ten-tuor">
                        <span><?php if (isset($_GET["id"])) {
                                    echo $row["Tentour"];
                                } ?></span>
                    </div>
                </div>
                <div class="box-thanhtoan">
                    <div class="left">
                        <p>Họ tên</p>
                        <input type="text" name="" id="name">
                    </div>
                    <div class="right">
                        <p>Giới tính</p>
                        <select>
                            <option value="nam">Nam</option>
                            <option value="nu">Nữ</option>
                        </select>
                    </div>
                    <div style="clear: both;"></div>
                    <p>Số điện thoại</p>
                    <input type="text" name="" id="">
                    <p>Email</p>
                    <input type="text" name="" id="">
                    <p>Địa chỉ</p>
                    <input type="text" name="" id="">
                    <p>Ghi chú</p>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Đăng ký tuor">
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>

</body>

</html>