<?php
$conn = new mysqli('localhost', 'root', '', 'detaiphp');
$sql = "select * from tour where matour=" . $_GET['id'];
$result = $conn->query($sql);
foreach ($result as $row) {
    $sql2 = "delete from diadiem where madiadiem=" . $row['Madiadiem'];
}
$sql = "delete from tour where matour=" . $_GET['id'];
$conn->query($sql);
$conn->query($sql2);
if (isset($_GET['hi'])) {
    header('location: thongtintourtrongnuoc.php');
} else {
    header('location: thongtintournuocngoai.php');
}