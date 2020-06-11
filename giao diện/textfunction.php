<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
function a(id) {
    return document.getElementById(id);
}


function tinh() {
    var c = a('i').value * 200;
    var d = a('as');
    d.innerHTML = c;
}
</script>
<?php

?>

<body>
    <form action="" method="post">
        <input type="number" oninput="tinh()" name="u" id="i">
        <span>200</span>
        <span>ket qua = <i id="as">alo</i></span>
        <input type="submit" name="a" value="xem">
    </form>
    <?php
    // if (!empty($_POST['u'])) {
    //     tinh($_POST['u'], 200);
    // }
    ?>
</body>

</html>