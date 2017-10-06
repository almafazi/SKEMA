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
	<title>Admin Panel</title>
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
<h1>Daftar Berita: </h1>
<form action="proses-edit-berita.php" method="post">

  <?php
  $id = $_GET['berita'];
  $kueri = mysql_query("SELECT * FROM Artikel WHERE id = '$id'");
  while($baris = mysql_fetch_assoc($kueri)){
  ?>
	<div class="my-input">
		<label><b>Judul : </b></label><br>
		<input type="text" name="judul" value="<?php echo $baris['judul']; ?>" id="input-kode">
	</div>
	<div class="my-input">
		<label><b>Konten : </b></label><br>
		<textarea name="konten" rows="8" cols="80"><?php echo $baris['konten']; ?></textarea>
	</div>

  <input type="submit" name="submit" value="Simpan">
  <?php } ?>
</form>
</section>
</section>

<footer>
<p>Copyright 2017 &copy; SKEMA</p>
</footer>
</div>
</body>
</html>
