<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="tintuc.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <?php
            include 'menu.php';
            ?>
            <div class="content">
                <div class="text-header">
                    <p>Tin tức</p>
                </div>
                <div class="box">
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                    $sql = "select * from tintuc";
                    $result = $conn->query($sql);
                    foreach ($result as $row) {
                    ?>
                    <div class="box-tintuc">
                        <div class="img">
                            <img src="<?php echo $row['image'] ?>" alt="">
                        </div>
                        <div class="box-text">
                            <div class="tieude">
                                <strong><a
                                        href="doctin.php?id=<?php echo $row['Matintuc'] ?>"><?php echo $row['Tentintuc'] ?></a></strong>
                            </div>
                            <div class="date">
                                <i class='fas fa-calendar-alt'
                                    style='color:silver;margin-right: 10px'></i><?php echo $row['Ngaydang'] ?>
                            </div>
                            <hr>
                            <div class="noidung">
                                <span><?php echo $row['Tomtat'] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    } ?>
                </div>
            </div>

            <?php
            include 'footer.php';
            ?>
        </div>
    </form>
</body>

</html>