<?php
include 'connect.php';
$id = $_GET['id'];

$a=mysql_query("SELECT * FROM gambar WHERE id = '$id'");
$cek=mysql_fetch_assoc($a);
$folder ="../gambar/$cek[nama_file]";
unlink($folder);
$delete = mysql_query("delete from gambar where id = '$id'");
echo"<script>alert('gallery berhasil di hapus');window.location='galeri.php'</script>";
?>
