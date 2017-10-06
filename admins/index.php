<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['nama_ukm'])) {
	echo '<script> alert("Anda harus login!"); window.history.back(); </script>';
} else
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel <?php echo $_SESSION['nama_ukm']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
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
					<li><a href="daftar-berita.php" id="button-berita">Kelola Berita</a></li>
				</ul>
			</aside>

			<section class="content">
				<h3>Selamat Datang : <b><?php echo $_SESSION['nama_ukm']; ?></b></h3>
				<br>
				<span>Pilih menu disamping untuk memulai mengelola UKM.</span>
			</section>
		</section>

		<footer>
			<p>Copyright 2017 &copy; SKEMA</p>
		</footer>
	</div>
</body>
</html>
