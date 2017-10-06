<?php
include '../koneksi.php';

if(
  isset($_POST['nim'])  &&
  isset($_POST['email'])
) {
  $nim = mysql_real_escape_string($_POST['nim']);
  $email = mysql_real_escape_string($_POST['email']);
  $nama = mysql_real_escape_string($_POST['nama']);
  $line = mysql_real_escape_string($_POST['idline']);
  $ttl = mysql_real_escape_string($_POST['ttl']);
  $jurusan = mysql_real_escape_string($_POST['jurusan']);
  $fakultas = mysql_real_escape_string($_POST['fakultas']);
  $motivasi = mysql_real_escape_string($_POST['motivasi']);
  $ukm = mysql_real_escape_string($_POST['ukm']);

}

$ambil = mysql_query("SELECT * FROM Mahasiswa WHERE nim = '$nim' OR email = '$email'");
$cek = mysql_num_rows($ambil);

if($cek == 0){
  mysql_query("INSERT INTO Mahasiswa (nim,email,nama,idline,ttl,jurusan,fakultas,motivasi,ukm)
   VALUES('$nim','$email','$nama','$line','$ttl','$jurusan', '$fakultas', '$motivasi', '$ukm')") or die(mysql_error($link));
  echo "
  <script> alert('Pendaftaran Berhasil, Mohon Tunggu Informasi Mahasiswa Yang Lolos Seleksi Setelah Jadwal Ditutup :)');
  window.history.back();
  </script>";
} else {
  echo "
  <script> alert('Error!, Data Sudah Terdaftar');
  window.history.back();
  </script>";
}


?>
