<?php
include 'connect.php';
$id = $_GET['id'];

$delete = mysql_query("delete from Mahasiswa where id = '$id'");
echo"<script>alert('Mahasiswa berhasil di hapus');window.location='edit-daftar.php'</script>";
?>
