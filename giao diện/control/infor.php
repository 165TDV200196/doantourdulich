<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>infor</title>
    <link rel="stylesheet" href="infor.css">
</head>
<script>
function a(id) {
    return document.getElementById(id);
}


function tinhnl() {
    var c = a('nl').value * a('gianl').value;
    var d = a('nguoilon');
    d.innerHTML = c + "đ";
    return c;
}

function tinhte() {
    var c = a('as').value * a('giate').value;
    var d = a('treem');
    d.innerHTML = c + "đ";
    return c;
}

function tinheb() {
    var c = a('as1').value * a('giaeb').value;
    var d = a('embe');
    d.innerHTML = c + "đ";
    return c;
}

function tinhtong() {

    var tong = tinhte() + tinhnl() + tinheb();
    var d = a('tong');
    d.innerHTML = tong;
}
</script>

<body>
    <form method="post">
        <div class="container">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'detaiphp');
            include 'menu.php';
            if (isset($_GET['id'])) {
                $isNew = false;
                $sql = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem where matour=" . $_GET['id'];
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
            ?>
            <div class="content">
                <div class="boxdat">
                    <div class="name">
                        <p><?php if (isset($_GET["id"])) {
                                echo $row["Tentour"];
                            } ?></p>
                    </div>
                    <div class="form">
                        <div class="image">
                            <img src="<?php if (isset($_GET["id"])) {
                                            echo $row["image"];
                                        } ?>" width="540px" height="360px" alt="">
                        </div>
                        <div class="text-box">
                            <span> - Phương tiện di chuyển: xe bus</span><br>
                            <span> - Ngày khởi hành: <?php if (isset($_GET["id"])) {
                                                            echo $row["Ngaykhoihanh"];
                                                        } ?></span><br>
                            <p>- Đến Hòn Rơm tham quan đồi cát vàng dưới tác động của gió biển đã tạo nên những hình
                                dạng
                                rất tuyệt vời</p>
                            <p>- Thư giãn tại Trung tâm Bùn khoáng Mũi Né</p>
                            <ul>
                                <li>Loại khách</li>
                                <li>Số Lượng</li>
                                <li>Đơn Giá</li>
                                <li>Tổng Giá</li>
                            </ul>
                            <br><br>
                            <hr>
                            <ul>
                                <li>Người Lớn</li>
                                <li><input type="number" oninput="tinhnl()" onkeyup="tinhtong()" onchange="tinhtong()"
                                        value="0" min="0" name="nl" id="nl"></li>
                                <li><?php if (isset($_GET["id"])) {
                                        echo $row["Giatiennguoilon"];
                                    } ?>đ</li>
                                <input type="number" hidden="true" name="" value="<?php if (isset($_GET["id"])) {
                                                                                        echo $row["Giatiennguoilon"];
                                                                                    } ?>" id="gianl">
                                <li id="nguoilon">0đ</li>
                            </ul><br><br><br>
                            <ul>
                                <li>Trẻ Em </li>
                                <li><input type="number" oninput="tinhte()" onkeyup="tinhtong()" onchange="tinhtong()"
                                        value="0" min="0" name="" id="as"></li>
                                <li><?php if (isset($_GET["id"])) {
                                        echo $row["Giatientreem"];
                                    } ?>đ</li>
                                <input type="number" hidden="true" name="" value="<?php if (isset($_GET["id"])) {
                                                                                        echo $row["Giatientreem"];
                                                                                    } ?>" id="giate">
                                <li id="treem">0đ</li>
                            </ul><br><br><br>
                            <ul>
                                <li>Em Bé </li>
                                <li><input type="number" oninput="tinheb()" onkeyup="tinhtong()" onchange="tinhtong()"
                                        value="0" min="0" name="" id="as1"></li>
                                <li><?php if (isset($_GET["id"])) {
                                        echo $row["Giatienembe"];
                                    } ?>đ</li>
                                <input type="number" hidden="true" name="" value="<?php if (isset($_GET["id"])) {
                                                                                        echo $row["Giatienembe"];
                                                                                    } ?>" id="giaeb">
                                <li id="embe">0đ</li>
                            </ul>
                            <p id="tt">Tổng tiền:
                                <span id="tong">0</span>đ</p><br><br><br>
                            <a href="thanhtoan.php?id=<?php if (isset($_GET["id"])) {
                                                            echo $row["Matour"];
                                                        } ?>">Đặt hàng ngay</a>
                        </div>
                    </div>
                </div>
                <div class="chitiet">
                    <p>GIỚI THIỆU TOUR</p>
                    <div class="box-chuongtrinh">
                        <p><?php if (isset($_GET["id"])) {
                                echo $row["Chitietdiadiem"];
                            } ?></p>
                    </div>
                </div>

            </div>
            <div class="tuor-cung-loai">
                <p>Tour Cùng Loại</p>
                <hr>
                <?php
                $sql2 = "SELECT * from tour t JOIN diadiem dd on t.Madiadiem=dd.Madiadiem WHERE t.Matour!=" . $_GET['id'] . " and maloaitour=1 LIMIT 3 ";
                $result2 = $conn->query($sql2);
                foreach ($result2 as $row) {
                ?>
                <div class="box_dulich">
                    <div class="img">
                        <img src="<?php echo $row['image'] ?>" width="100%" height="242px" alt="">
                    </div>
                    <div class="address"><a
                            href="infor.php?id=<?php echo $row['Matour'] ?>"><?php echo $row['Tendiadiem'] ?> -
                            <?php echo $row['Diachi'] ?></a></div>
                    <hr>
                    <div class="price"><?php echo $row['Giatiennguoilon'] ?>đ</div>
                </div>
            </div>
            <?php
                }
                include 'footer.php';
        ?>
        </div>
    </form>
</body>

</html>