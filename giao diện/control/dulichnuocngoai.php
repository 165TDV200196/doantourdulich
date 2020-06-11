<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Du lịch nước ngoài</title>
    <link rel="stylesheet" href="dulichnuocngoai.css">
</head>
<?php
$link = new mysqli('localhost', 'root', '', 'detaiphp') or die('Ket noi that bai');
$sql = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem join loaitour lt on lt.Maloaitour=t.Maloaitour where t.maloaitour='2'";
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
                    <p>Du lịch nước ngoài</p>
                    <hr>
                    <span>Sẽ thật tuyệt vời nếu bạn có vài tình bạn xuyên biên giới, các bạn có thể chia sẻ kiến thức về
                        văn hóa, phong tục tập quán và tôn giáo cho nhau. Đi du lịch nước ngoài là cách tốt nhất để thực
                        hiện việc này. Hơn thế, trò chuyện với người nước ngoài còn giúp tăng khả năng ngôn ngữ của
                        bạn.</span>
                    <div class="danhsachtour">Danh sách tour du lịch nước ngoài</div>
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
        <?php include 'footer.php';
        ?>
    </div>
</body>

</html>