<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'detaiphp') or die('Ket noi that bai');

$tt = "";
if (isset($_POST['login'])) {
    $sql = "select * from khachhang where Username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        header('location: ../index.php');
        $_SESSION['admin'] = true;
    } else {
        $tt = "<br>dang nhap that bai";
    }
}
?>

<body>
    <div class="container">
        <!-- <img src="dulich.jpg" width="10%" height="100%" alt=""> -->
        <form method="post">
            <div class="admin">
                <a href="loginnv.php">Admin</a></div>
            <div class="content">
                <p>Login</p>
                <div class="box"><span id="a">Tài khoản</span><br>
                    <input type="text" name="username" id="" value="vankien" placeholder="  Nhập tài khoản"><br>
                    <span id="a">Mật khẩu</span><br>
                    <input type="password" name="password" id="" value="1234" placeholder="  Nhập mật khẩu"><br>
                    <strong id="a"><a href="../Đăng ký/create.php">Tạo tài khoản</a></strong>
                    <strong id="a"><a href="#">Quên mật khẩu?</a></strong><br>
                    <input type="submit" name="login" value="Đăng nhập" id="a">
                    <?php
                    echo $tt;
                    ?>
                </div>
                <div class="icon">
                    <div class="bao" id="fb"><i class='fab fa-facebook-f'></i></div>
                    <div class="bao" id="tw"><i class='fab fa-twitter'></i></div>
                    <div class="bao" id="gg"><i class='fab fa-google'></i></div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>