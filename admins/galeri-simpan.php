<?php
ob_start();
session_start();
$gambar = $_SESSION['nama_ukm'];
include "connect.php";
if($_POST){
$judulpost  = $_POST['judul'];
$ext = explode(".",$_FILES['images']['name']);
$photo = $gambar.'/'.$judulpost.'.'.end($ext).'';
 move_uploaded_file($_FILES['images']['tmp_name'], '../gambar/'.$photo);
 
 mysql_query("insert into gambar(ukm,nama_file,judul,status)
 values('$gambar','$photo','$judulpost','1')")or die(mysql_error());
header('location:galeri.php');
exit;
}
?>
