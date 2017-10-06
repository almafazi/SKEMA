<?php
include 'connect.php';

session_start();
if(isset($_POST['submit'])) {
$username = mysql_real_escape_string($_POST['nama']);
$password = md5(mysql_real_escape_string($_POST['password']));
$sql = mysql_query("SELECT * FROM Admin WHERE user='$username' &&
pass='$password'");

$num = mysql_num_rows($sql);
if($num!=0) {
while($baris = mysql_fetch_assoc($sql)) {
  $nama = $baris['user'];
  $_SESSION['nama_ukm'] = $nama;
}

echo "
<script>
window.location.href='index.php';
</script>
";
} else {
echo "Redirecting ...
<script language='JavaScript'>
alert('Error! Anda BUkan Admin');
window.history.back();
</script>";
}
}
?>
