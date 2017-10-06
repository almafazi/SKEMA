<?php
include 'connect.php';
session_start();
$id = $_SESSION['nama_ukm'];

$nim = $_POST['nim'];

mysql_query("UPDATE Mahasiswa SET diterima = 'YA' WHERE nim = '$nim'") or die(mysql_error());
 ?>
