<?php
include 'connect.php';
session_start();
$id = $_SESSION['id'];

$jumlah = $_POST['jumlah'];

mysql_query("UPDATE cafe SET jumlah_kursi = jumlah_kursi - $jumlah WHERE id = '$id'") or die(mysql_error());
 ?>
