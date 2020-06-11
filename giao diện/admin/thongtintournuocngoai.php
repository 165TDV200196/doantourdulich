<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - thêm tour</title>
    <link rel="stylesheet" href="thongtintourtrongnuoc.css">
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
                            <p>TOUR DU LỊCH NƯỚC NGOÀI</p>
                        </center>
                        <div class="text">
                            <a href="themtour.php">Thêm tour</a>
                            <table border="1">
                                <tr>
                                    <th id="im">Ảnh</th>
                                    <th id="tt">Tên tour</th>
                                    <th id="tdc">Tên địa chỉ</th>
                                    <th id="ldd">Loại địa điểm</th>
                                    <th id="edit">Sửa</th>
                                    <th id="xoa">Xóa</th>
                                </tr>
                                <?php
                                $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                                $sql = "select t.matour,dd.image,t.Tentour,dd.Tendiadiem,dd.Loaidiadiem from tour t join diadiem dd on t.Madiadiem=dd.Madiadiem where maloaitour=2";
                                $result = $conn->query($sql);
                                foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td><img src='../control/<?php echo $row['image'] ?>' width="140px" alt=""></td>
                                    <td>
                                        <p><?php echo $row['Tentour'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['Tendiadiem'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $row['Loaidiadiem'] ?></p>
                                    </td>
                                    <td id="center"><a href="themtour.php?id=<?php echo $row['matour'] ?>">Sửa</a></td>
                                    <td id="center"><a href="">Xóa</a></td>
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