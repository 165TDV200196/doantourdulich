<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị admin</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <?php
            include 'menu.php';
            $conn = new mysqli('localhost', 'root', '', 'detaiphp');
            $sql = "select * from noiquy";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="content">
                <?php
                include 'header.php'
                ?>
                <div class="box">
                    <div class="content-box">
                        <div class="text">
                            <?php echo $row['noiquy']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>