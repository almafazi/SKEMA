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
$host = "localhost";
$user = "root";
$pass = "mysql";
$dbname ="RPL";
$conn = mysql_connect($host,$user,$pass);
if($conn) {
//select database
$sele = mysql_select_db($dbname);
if(!$sele) {
echo mysql_error();
}
}
#***************** akhir koneksi ******************#
#jika ditekan tombol login
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysql_query("SELECT * FROM Admin WHERE user='$username' &&
pass='$password'");
$num = mysql_num_rows($sql);
if($num==1) {
// login benar //
$_SESSION['admin'] = $username;
?>

<script language="JavaScript">swal('Selamat!', 'Login Sukses', 'success'); setTimeout(function(){location.href='index.php'} , 2000); </script><?
} else {
// jika login salah //
echo "Redirecting ... <script language='JavaScript'>swal('Error!', 'User Harus Sesuai', 'error'); setTimeout(function(){location.href='/index.php'} , 1000); </script>";
//include("login.php");

}
}
?>
