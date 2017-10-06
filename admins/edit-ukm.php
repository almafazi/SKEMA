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
				<li><a class="logout" href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>

		<section class="middle">
			<aside class="sidebar-kiri">
				<h2>Settings</h2>
				<ul>
					<li><a href="edit-ukm.php" id="button-edit" class="active">Edit UKM</a></li>
					<li><a href="edit-daftar.php" id="button-daftar">Kelola Pendaftaran</a></li>
					<li><a href="galeri.php" id="button-galeri">Kelola Galeri</a></li>
					<li><a href="daftar-berita.php" id="button-berita">Kelola Berita</a></li>
				</ul>
			</aside>

			<section class="content">
				<div class="tempat"></div>

<?php
$id = $_SESSION['nama_ukm'];
$kueri = mysql_query("SELECT * FROM UKM WHERE kode = '$id'");
while($baris = mysql_fetch_assoc($kueri)){
?>
<form action="proses-edit-UKM.php" id="nama" method="post" enctype="multipart/form-data">
	<div class="my-input">
		<label><b>Nama UKM : </b></label><br>
		<input type="text" name="nama" value="<?php echo $baris['nama']; ?>" id="input-nama">
	</div>
	<div class="my-input">
		<label><b>Kode : </b></label><br>
		<input type="text" name="kode" value="<?php echo $baris['kode']; ?>" id="input-kode" readonly>
	</div>
	<div class="my-input">
		<label><b>Kategori : </b></label><br>
		<input type="radio" name="kategori" value="Akademik" <?php if($baris['kategori'] == "Akademik") {echo "checked";} ?>>Akademik
		<input type="radio" name="kategori" value="Non Akademik" <?php if($baris['kategori'] == "Non Akademik") {echo "checked";} ?>>Non Akademik
	</div>
	<div class="my-input">
		<label><b>Deskripsi Singkat : </b></label><br>
		<textarea name="deskripsi"  rows="8" cols="80" id="input-deskripsi"><?php echo $baris['deskripsi']; ?></textarea>
	</div>
	<div class="my-input">
		<label><b>Tentang : </b></label><br>
		<input type="text" name="tentang" value="<?php echo $baris['tentang']; ?>" id="input-tentang">
	</div>
	<div class="my-input">
		<label><b>Deskripsi : </b></label><br>
		<textarea name="deskripsi_panjang" rows="8" cols="80" id="input-deskripsi-panjang"><?php echo $baris['deskripsi_panjang']; ?></textarea>
	</div>
	<div class="my-input">
		<label><b>Pembimbing : </b></label><br>
		<input type="text" name="pembimbing" value="<?php echo $baris['pembimbing']; ?>" id="input-pembimbing">
	</div>
	<div class="my-input">
		<label><b>Prestasi (Dipisahkan Dengan Baris Baru) : </b></label><br>
		<textarea name="prestasi" rows="8" cols="80" id="input-prestasi"><?php echo $baris['prestasi']; ?></textarea>
	</div>
	<div class="my-input">
		<label><b>Kegiatan</b></label><br>
		<textarea name="kegiatan" rows="8" cols="80" id="input-kegiatan"><?php echo $baris['kegiatan']; ?></textarea>
	</div>
	<div class="my-input">
		<label><b>Telepon : </b></label><br>
		<input type="text" name="telepon" value="<?php echo $baris['phone']; ?>" id="input-telepon">
	</div>
	<div class="my-input">
		<label><b>Line : </b></label><br>
		<input type="text" name="idline" value="<?php echo $baris['idline']; ?>" id="input-line">
	</div>
	<div class="my-input">
		<label><b>Twitter : </b></label><br>
		<input type="text" name="twitter" value="<?php echo $baris['twitter']; ?>" id="input-twitter">
	</div>
	<div class="my-input">
		<label><b>Instagram : </b></label><br>
		<input type="text" name="instagram" value="<?php echo $baris['instagram']; ?>" id="input-instagram">
	</div>
	<div class="my-input">
		<label><b>Facebook : </b></label><br>
		<input type="text" name="facebook" value="<?php echo $baris['facebook']; ?>" id="input-facebook">
	</div>
	<div class="my-input">
		<label><b>Struktur (Dipisahkan Dengan Baris Baru) : </b></label><br>
		<textarea name="struktur" rows="8" cols="80" id="input-struktur"><?php echo $baris['struktur']; ?></textarea>
	</div>

	<div class="my-input">
		<label><b>Foto : </b></label><br>
			<img height="120px" width="130px" src="../assets/img/UKM/<?php echo $baris['foto']; ?>"><BR>
			<input id="upload-photo" name="image" type="file"><br>
	</div>

		<div class="my-input">
			<label><b>Logo : </b></label><br>
				<img height="120px" width="130px" src="../assets/img/UKM/<?php echo $baris['logo']; ?>"><BR>
				<input id="upload-photo" name="image-logo" type="file"><br>
		</div>

		<div class="my-input">
			<label><b>Status : </b></label><br>
			<input type="radio" name="status" value="Open" <?php if($baris['status'] == "Open") {echo "checked";} ?>>Open
			<input type="radio" name="status" value="Close" <?php if($baris['status'] == "Close") {echo "checked";} ?>>Close
		</div>


	<input type="submit" name="submit" value="Simpan">
</form>
<?php } ?>

</section>

<footer>
<p>Admin Panel SKEMA</p>
</footer>
</div>

	<script type="text/javascript" src="js/logout.js"></script>
</body>
</html>
