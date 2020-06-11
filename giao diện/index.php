<!DOCTYPE html>
<html lang="en">
<!-- https://ant-du-lich.mysapo.net/# -->
<!-- https://teatravel.mysapo.net/ -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="index.css">
</head>
<?php
$conn = new mysqli('localhost', 'root', '', 'detaiphp');
function tach($string)
{
    return substr($string, 3);
} ?>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="logomoi.PNG" width="400px" height="200px" alt="" style="float: left; opacity: 1;">
                <!-- <div class="login">
                    <a href="Đăng nhập/login.php">Đăng nhập</a><a href="Đăng ký/create.php">Đăng xuất</a>
                </div> -->
                <div class="search">
                    <input type="text" name="" placeholder="...tìm kiếm" id="seach">
                </div>
                <div class="clear"></div>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href=""> Du lịch</a>
                        <ul class="submenu">
                            <li><a href="control/dulichtrongnuoc.php"> Du lịch trong nước</a></li>
                            <li><a href="control/dulichnuocngoai.php"> Du lịch nước ngoài</a></li>
                        </ul>
                    </li>
                    <li><a href=""> Khách sạn</a></li>
                    <li><a href=""> Phương tiện</a>
                        <ul class="submenu">
                            <li><a href=""> Thuê xe</a></li>
                            <li><a href=""> Mua vé máy bay</a></li>
                        </ul>
                    </li>
                    <li><a href="control/tintuc.php"> Tin tức</a></li>
                    <li><a href=""> Khuyến mãi</a></li>
                    <li><a href="control/lienhe.php"> liên hệ</a></li>
                    <?php
                    session_start();

                    if (!isset($_SESSION['admin'])) {
                    ?>
                    <li><a href="login/login.php">Đăng nhập</a></li>
                    <?php
                    } else {
                    ?>
                    <li><a href="control/logout.php?id=1">Đăng xuất</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="banner">
        </div>
        <div class="content">
            <div class="cam_nang_du_lich">
                <p>CẨM NANG DU LỊCH</p>
                <span>Tất cả những thông tin hữu ích bạn cần tham khảo để lên kế hoạch chuẩn bị tốt nhất cho<br> chuyến
                    du lịch của mình</span>
                <div style="height: 10px;"></div>
                <div class="box_cam_nang">
                    <div class="hident">
                        <div class="bordercn">
                            <div class="icon">
                                <img src="palm_tree_filled_50px.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="textcn">
                        <p>Mùa du lịch</p>
                        <span>Những thời điểm tốt nhất dành cho du lịch của từng địa điểm mà bạn muốn đến</span>
                    </div>
                </div>
                <div class="box_cam_nang">
                    <div class="hident">
                        <div class="bordercn">
                            <div class="icon">
                                <img src="money_80px.png" width="50px" height="50px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="textcn">
                        <p>Chi phí</p>
                        <span>Thông tin những khoản chi phí bạn cần dự phòng cho chuyến đi của mình</span>
                    </div>
                </div>
                <div class="box_cam_nang">
                    <div class="hident">
                        <div class="bordercn">
                            <div class="icon">
                                <img src="worldwide_location_filled_50px.png" width="50px" height="50px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="textcn">
                        <p>Địa điểm đẹp</p>
                        <span>Các điểm nên đến, danh lam thắng cảnh của thành phố bạn tới thăm quan</span>
                    </div>
                </div>
                <div class="box_cam_nang">
                    <div class="hident">
                        <div class="bordercn">
                            <div class="icon">
                                <img src="paper_plane_filled_50px.png" width="50px" height="50px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="textcn">
                        <p>Phương tiện di chuyển</p>
                        <span>Thông tin các phương tiện bạn có thể sử dụng để di chuyển đến điểm du lịch</span>
                    </div>
                </div>
            </div>
            <div class="trongnuoc" style="clear: both;">
                <p>Tour trong nước</p>
                <span>Cùng gia đình và bạn bè có những khoảnh khắc đẹp bên nhau nào.</span>
                <hr>
                <?php
                $sql = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem where t.maloaitour=1 LIMIT 6";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                ?>
                <div class="box_dulich">
                    <div class="img">
                        <img src="<?php echo tach($row['image']); ?>" width="100%" height="242px" alt="">
                    </div>
                    <div class="address"><a
                            href="control/infor.php?id=<?php echo $row["Matour"]; ?>"><?php echo $row["Tendiadiem"]; ?>
                            - <?php echo $row["Diachi"]; ?></a></div>
                    <hr>
                    <div class="price"><?php echo $row["Giatiennguoilon"]; ?>đ</div>
                </div>
                <?php } ?>
            </div>
            <div class="yeuthich" style="clear: both;">
                <p>Tour yêu thích</p>
                <span>Cùng gia đình và bạn bè có những khoảnh khắc đẹp bên nhau nào.</span>
                <hr>
                <div class="box_yeuthich">
                    <div class="img">
                        <img src="img/dong-phong-nha-05.jpg" width="100%" height="242px" alt="">
                    </div>
                    <div class="address">Phong Nha Kẻ Bàng - Quảng Bình</div>
                    <hr>
                    <div class="price">8,000,000</div>
                </div>
                <div class="box_yeuthich">
                    <div class="img">
                        <img src="img/dong-phong-nha-05.jpg" width="100%" height="242px" alt="">
                    </div>
                    <div class="address">Phong Nha Kẻ Bàng - Quảng Bình</div>
                    <hr>
                    <div class="price">8,000,000</div>
                </div>
                <div class="box_yeuthich">
                    <div class="img">
                        <img src="img/dong-phong-nha-05.jpg" width="100%" height="242px" alt="">
                    </div>
                    <div class="address">Phong Nha Kẻ Bàng - Quảng Bình</div>
                    <hr>
                    <div class="price">8,000,000</div>
                </div>
                <div class="box_yeuthich">
                    <div class="img">
                        <img src="img/dong-phong-nha-05.jpg" width="100%" height="242px" alt="">
                    </div>
                    <div class="address">Phong Nha Kẻ Bàng - Quảng Bình</div>
                    <hr>
                    <div class="price">8,000,000</div>
                </div>
                <div class="box_yeuthich">
                    <div class="img">
                        <img src="img/dong-phong-nha-05.jpg" width="100%" height="242px" alt="">
                    </div>
                    <div class="address">Phong Nha Kẻ Bàng - Quảng Bình</div>
                    <hr>
                    <div class="price">8,000,000</div>
                </div>
                <div class="box_yeuthich">
                    <div class="img">
                        <img src="img/dong-phong-nha-05.jpg" width="100%" height="242px" alt="">
                    </div>
                    <div class="address">Phong Nha Kẻ Bàng - Quảng Bình</div>
                    <hr>
                    <div class="price">8,000,000</div>
                </div>

            </div>
            <div class="ngoainuoc" style="clear: both;">
                <p>Tour nước ngoài</p>
                <span>Cùng gia đình và bạn bè có những khoảnh khắc đẹp bên nhau nào.</span>
                <hr>
                <?php
                $sql2 = "select * from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem where t.maloaitour=2 LIMIT 6";
                $result2 = $conn->query($sql2);
                foreach ($result2 as $row) {
                ?>
                <div class="box_dulich">
                    <div class="img">
                        <img src="<?php echo tach($row['image']); ?>" width="100%" height="242px" alt="">
                    </div>
                    <div class="address"><a
                            href="control/infor.php?id=<?php echo $row["Matour"]; ?>"><?php echo $row["Tendiadiem"]; ?></a>
                    </div>
                    <hr>
                    <div class="price"><?php echo $row['Giatiennguoilon']; ?>đ</div>
                </div><?php } ?>
                <div style="clear: both;"></div>
            </div>
        </div>
        <?php
        include 'control/footer.php';
        ?>
    </div>
</body>

</html>