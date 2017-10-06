<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['nama_ukm'])) {
	echo '<script> alert("Anda harus login!"); window.history.back(); </script>';
} else
$ukm = $_SESSION['nama_ukm'];
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
					<li><a href="galeri.php" id="button-galeri" class="active">Kelola Galeri</a></li>
					<li><a href="daftar-berita.php" id="button-berita">Kelola Berita</a></li>
				</ul>
			</aside>

			<section class="content">
					<center>
					<form  method="post" action="galeri-simpan.php" enctype="multipart/form-data">
					  <center>
					  <tr>
					   <td>CAPTION FOTO</td><br>
					   <td><input type="text" placeholder="Type your Caption here..." maxlength="500" name="judul" required/></td><br><br>
					   </tr>
					   <tr>
					   <td><input type="file" id="images" name="images" multiple></td>
					  </tr>
					  <center>
					  <br><input title="simpan" type="submit"  name="submit" value="Simpan" /><br>
					  <br>
					</form>
				</center>
					<table border="1px">
					<tr>
					  <th><center>Judul</th>
					    <th><center>Photo</th>
					    <th><center>Aksi</th>
					</tr>

<?php
$has = mysql_query("select * from gambar where ukm = '$ukm' order by id desc");
while($data=mysql_fetch_assoc($has)){
 echo '<tr>
      <td>'.$data['judul'].'</td>
      <td><img width="300px" src="../gambar/'.$data['nama_file'].'"/></div></td>
       <td> <a href="galeri-hapus.php?id='.$data['id'].'" style="text-decoration:none;color:red;"><center>Delete</a></td>
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
