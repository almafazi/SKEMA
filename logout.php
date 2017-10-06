<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src='dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='dist/sweetalert.css'>
  </head>
</html>
<?php
session_start();
session_destroy();
echo "<script> swal('Berhasil!', 'Anda Sudah Logout', 'success'); setTimeout(function(){location.href='/RPL/'} , 2000); </script>";
?>
