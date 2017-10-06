<?php
include 'connect.php';
$id = $_GET['berita'];

$delete = mysql_query("DELETE FROM Artikel WHERE id = '$id'");
if($delete) {
echo"<script>alert('Berita berhasil di hapus');window.history.back()</script>";
} else {
  mysql_error();
}
?>
