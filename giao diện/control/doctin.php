<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc tin</title>
    <link rel="stylesheet" href="doctin.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <?php
            include "menu.php";
            ?>
            <div class="content">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'detaiphp');
                if (isset($_GET['id'])) {
                    $sql = "select * from tintuc where matintuc=" . $_GET['id'];
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }
                ?>
                <div class="text-box">
                    <p id="title"><strong><?php if (isset($_GET['id'])) {
                                                echo $row["Tentintuc"];
                                            } ?></strong></p>
                    <span>
                        <i class='fas fa-calendar-alt' style='color:silver;margin-right: 10px'></i><?php if (isset($_GET['id'])) {
                                                                                                        echo $row["Ngaydang"];
                                                                                                    } ?></span><br>
                    <hr id="ii">
                    <p id="nd"><?php if (isset($_GET['id'])) {
                                    echo $row["Noidung"];
                                } ?></p>
                </div>
                <div class="tinmoi">
                    <p><strong>Các tin khác</strong></p>
                    <hr id="i">
                    <ul>
                        <?php
                        $sql1 = "select * from tintuc";
                        $result2 = $conn->query($sql1);
                        foreach ($result2 as $row2) {
                        ?>
                        <li><a title="<?php echo $row2['Tentintuc']; ?>"
                                href="doctin.php?id=<?php echo $row2['Matintuc']; ?>"><?php echo $row2['Tentintuc']; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php
            include "footer.php";
            ?>
        </div>
    </form>
</body>

</html>