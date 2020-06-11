<?php
$conn = new mysqli('localhost', 'root', '', 'detaiphp');
$sql = "delete from tintuc where matintuc=" . $_GET['id'];
$conn->query($sql);
header('location: tintuc.php');