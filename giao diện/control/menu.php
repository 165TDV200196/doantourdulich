<style>
* {
    margin: 0;
    padding: 0;
}

.menu {
    background-color: #225486;
    height: 40px;
    color: white;
}

.menu>ul>li {
    float: left;
    list-style-type: none;
    line-height: 40px;
    padding: 0px 15px;
    position: relative;
    left: 252px;
}

.menu ul ul {
    position: absolute;
}

.menu>ul>li a {
    text-decoration: none;
    padding: 0px 10px;
    display: block;
    color: white;
}

.menu li>ul {
    list-style: none;
    background-color: #225486;
    width: 200px;
    display: none;
}

.menu>ul>li a:hover {
    color: cyan;
}

.submenu>li>ul>li {
    display: flex;
}

.menu>ul>li:hover>ul {
    display: block;
}

.submenu>li:hover>ul {
    display: block;
}


/* ------------------ top-header -------------- */

.top-header {
    background-color: silver;
    height: 60px;
    width: 100%;
}

.top-header>span {
    position: absolute;
    font-size: 19px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    line-height: 60px;
    padding-left: 20px;
}

.top-header>img {
    height: 60px;
    margin: 0 auto;
    display: block;
}
</style>
<div class="header">
    <div class="top-header">
        <span>Liên hệ: +084237623723</span>
        <img src="img/logomoi.png" alt="">
    </div>
    <div class="menu">
        <ul>
            <li><a href="../index.php">Trang chủ</a></li>
            <li><a href=""> Du lịch</a>
                <ul class="submenu">
                    <li><a href="dulichtrongnuoc.php"> Du lịch trong nước</a> </li>
                    <li><a href="dulichnuocngoai.php"> Du lịch ngoài nước</a> </li>
                </ul>
            </li>
            <li><a href=""> Khách sạn</a></li>
            <li><a href=""> Phương tiện</a>
                <ul class="submenu">
                    <li><a href=""> Thuê xe</a></li>
                    <li><a href=""> Mua vé máy bay</a></li>
                </ul>
            </li>
            <li><a href="tintuc.php"> Tin tức</a></li>
            <li><a href=""> Khuyến mãi</a></li>
            <li><a href="lienhe.php"> Liên hệ</a></li>
            <?php
            session_start();
            if (!isset($_SESSION['admin'])) {
            ?>
            <li><a href="../login/login.php">Đăng nhập</a></li>
            <?php
            } else {
            ?>
            <li><a href="logout.php">Đăng xuất</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>