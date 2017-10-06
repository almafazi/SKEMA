<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['admin']);
unset($_SESSION['cafe']);
echo "<script>
alert('Logout Sukses!');
window.location = '/peweb/admin';</script>";
?>
