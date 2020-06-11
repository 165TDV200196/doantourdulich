<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Du lịch trong nước</title>
    <link rel="stylesheet" href="dulichtrongnuoc.css">
</head>
<?php
$link = new mysqli('localhost', 'root', '', 'detaiphp') or die('Ket noi that bai');
$sql = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem join loaitour lt on lt.Maloaitour=t.Maloaitour where t.maloaitour='1'";
?>

<body>
    <div class="container">
        <?php include 'menu.php';
        ?>
        <div class="content">
            <div class="box">
                <div class="box-search">
                    <div class="cach">
                        <p>Địa điểm</p>
                        <select name="" id="">
                            <option value="Nghệ an">Nghệ An</option>
                        </select>
                        <p>Loại tour</p>
                        <select name="" id="">
                            <option value="Trong nước">Trong nước</option>
                            <option value="Ngoài nước">Ngoài nước</option>
                        </select>
                        <p>Giá</p>
                        <select name="" id="">
                            <option value="">Trên 10tr</option>
                            <option value="">Dưới 10tr</option>
                        </select>
                        <input type="submit" value="Tìm kiếm">
                    </div>
                </div>
                <div class="list-tour">
                    <p>Du lịch trong nước</p>
                    <hr>
                    <span>Đất nước Việt Nam cong cong hình chữ S có nhiều danh thắng mang vẻ đẹp tự nhiên, cùng nền văn
                        hoá đặc sắc là điểm đến tuyệt vời trong mắt du khách. Miền Bắc có Sapa, Hà Giang, Ninh Bình, Hạ
                        Long. Miền Trung có Huế, Quảng Bình, Đà Nẵng. Miền Nam có Hồ Chí Minh, Phú Quốc, đồng bằng sông
                        Cửu Long … Bạn đã đi đến những nơi nào rồi?</span>
                    <div class="danhsachtour">Danh sách tour du lịch trong nước</div>
                    <?php
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="box-dulich">
                        <p><?php echo $row['Diachi'] ?></p>
                        <hr>
                        <div class="img">
                            <img src="<?php echo $row['image'] ?>" alt="">
                        </div>
                        <div class="text">
                            <div class="left-text">
                                <p>Thông tin</p>
                                <hr>
                                <p><?php echo $row['Tendiadiem'] ?></p>
                                <p>Loại địa điểm: <?php echo $row['Loaidiadiem'] ?></p>
                            </div>
                            <div class="right-text">
                                <p>Giá</p>
                                <hr>
                                <p>Giá người lớn: <?php echo $row['Giatiennguoilon'] ?>đ</p>
                                <p>Giá trẻ em: <?php echo $row['Giatientreem'] ?>đ</p>
                                <p>Giá em bé: <?php echo $row['Giatienembe'] ?>đ</p>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>