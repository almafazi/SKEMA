<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['nama_ukm'])) {
	echo '<script> alert("Anda harus login!"); window.history.back(); </script>';
} else
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel <?php echo $_SESSION['nama_ukm']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/admins.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
</head>
<body>
	<div class="container">
		<header>
			<h1>Admin Panel <?php echo $_SESSION['nama_ukm']; ?></h1>
		</header>

		<nav id="navbar">
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>

		<section class="middle">
			<aside class="sidebar-kiri">
				<h2>Settings</h2>
				<ul>
					<li><a href="edit-ukm.php" id="button-edit">Edit UKM</a></li>
					<li><a href="edit-daftar.php" id="button-daftar">Kelola Pendaftaran</a></li>
					<li><a href="galeri.php" id="button-galeri">Kelola Galeri</a></li>
					<li><a href="daftar-berita.php" id="button-berita"  class="active">Kelola Berita</a></li>
				</ul>
			</aside>

			<section class="content">
<h1>Daftar Berita : </h1>
<button type="button" onclick="window.location.href='tambah-berita.php'">Tambah Berita</button><br><br>
<table border="1px">
<tr>
    <th><center>No</th>
      <th><center>Judul</th>
        <th><center>Tanggal</th>
          <th><center>Konten</th>
            <th></th>
</tr>

<?php
$ukm = $_SESSION['nama_ukm'];
$has = mysql_query("select * from Artikel where penerbit = '$ukm'");
$i=0;
while($data=mysql_fetch_assoc($has)){
 echo '<tr>
      <td>'.++$i.'</td>
        <td>'.$data['judul'].'</td>
          <td>'.$data['tanggal'].'</td>
            <td>'.substr($data['konten'],0,100).'...</td>
       <td> <a href="proses-hapus-berita.php?berita='.$data['id'].'" style="text-decoration:none;color:red;"><center>x</a><br><a href="edit-berita.php?berita='.$data['id'].'" style="text-decoration:none;color:red;"><center>edit</a></td>
       </tr> ';
}
?>
</table>

</section>
</section>

<footer>
<p>Copyright 2017 &copy; Praktikum Pemrograman Web 2016/2017</p>
</footer>
</div>
</body>
</html>
