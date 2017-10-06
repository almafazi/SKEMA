<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['nama_ukm'])) {
	echo '<script> alert("Anda harus login!"); window.history.back(); </script>';
} else
$id = $_SESSION['nama_ukm'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel <?php echo $_SESSION['nama_ukm']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/admins.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
</head>
<body>
	<div class="container1">
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
					<li><a href="edit-ukm.php" id="button-edit" >Edit UKM</a></li>
					<li><a href="edit-daftar.php" id="button-daftar" class="active">Kelola Pendaftaran</a></li>
					<li><a href="galeri.php" id="button-galeri">Kelola Galeri</a></li>
					<li><a href="daftar-berita.php" id="button-berita">Kelola Berita</a></li>
				</ul>
			</aside>

			<section class="content" style="width:inherit">
<h1>Daftar Pendaftaran : </h1>
<table border="1px">
<tr>
    <th><center>NO</th>
    <th><center>NAMA</th>
      <th><center>NIM</th>
				<th><center>LINE</th>
					<th><center>TTL</th>
					<th><center>JURUSAN</th>
						<th><center>MOTIVASI</th>
          <th><center>TANGGAL</th>
            <th><center>DITERIMA</th>
                <th></th>



</tr>

<?php
$has = mysql_query("select * from Mahasiswa where ukm = '$id' order by tgl desc");
$i=0;
while($data=mysql_fetch_assoc($has)){
 echo '<tr>
      <td>'.++$i.'</td>
        <td>'.$data['nama'].'</td>
          <td>'.$data['nim'].'</td>
					<td>'.$data['line'].'</td>
					<td>'.$data['ttl'].'</td>
					<td>'.$data['jurusan'].'</td>
					<td>'.$data['motivasi'].'</td>
            	<td>'.substr($data['tgl'],2,9).'</td>';

							if($data['diterima'] == 'YA') {
							echo '
                  <td><input type="radio" name="diterima'.$data['nim'].'" id="'.$data['nim'].'" value="diterima" checked>Y
									<input type="radio" name="diterima'.$data['nim'].'" onclick="unditerima('.$data['nim'].');" id="'.$data['nim'].'" value="tidak diterima">T</td>';

							} else {
								echo '
	                  <td><input type="radio" onclick="diterima('.$data['nim'].')" name="tdk-diterima'.$data['nim'].'" id="'.$data['nim'].'" value="diterima">Y
										<input type="radio" name="tdk-diterima'.$data['nim'].'" id="tdk-diterima" value="tidak diterima" checked>T</td>';
							}

		echo '

       <td> <a href="mhs-hapus.php?id='.$data['ID'].'" style="text-decoration:none;color:red;"><center>x</a></td>
       </tr> ';
}
?>
</table>

</section>
</section>


<script type="text/javascript">

			function unditerima(nim) {
					var dataString = 'nim='+ nim;
					$.ajax({
						type: "POST",
						url: "remove-diterima.php",
						data: dataString,
						cache: false,
						success: function(result){
						alert('Mahasiswa '+ nim + ' Ditolak');
						location.reload();
					}
					});
			}

			function diterima(nim) {
					var dataString = 'nim='+ nim;
					$.ajax({
						type: "POST",
						url: "add-diterima.php",
						data: dataString,
						cache: false,
						success: function(result){
						alert('Mahasiswa '+ nim + ' Diterima');
						location.reload();
					}
					});
			}

</script>

<footer>
<p>Copyright 2017 &copy; SKEMA</p>
</footer>
</div>
</body>
</html>
