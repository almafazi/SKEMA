<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src='js/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='js/sweetalert.css'>
  </head>
</html>
<?php
session_start();
session_destroy();
echo "<script> swal('Berhasil!', 'Anda Sudah Logout', 'success'); setTimeout(function(){location.href='/RPL/admin/index.html'} , 2000); </script>";
?>
