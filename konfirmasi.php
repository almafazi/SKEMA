<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src='dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='dist/sweetalert.css'>
  </head>
</html>
<?php
    include('init/koneksi.php');

    if( isset($_POST['nama'])  &&
        isset($_POST['NIM'])     &&
        isset($_POST['line']) &&
        isset($_POST['pilihukm']) &&
        isset($_POST['jkel'])
      )
    {
        $nama            = mysql_real_escape_string($_POST['nama']);
        $NIM             = mysql_real_escape_string($_POST['NIM']);
        $line            = mysql_real_escape_string($_POST['line']);
        $pilihukm        = mysql_real_escape_string($_POST['pilihukm']);
        $jkel            = mysql_real_escape_string($_POST['jkel']);
    }else{
        header("location:index.php");}
          $ambilDataSql     = mysql_query("SELECT * FROM Mahasiswa WHERE nama = '$nama' AND UKM = '$pilihukm'");
        $cek_nama = mysql_num_rows($ambilDataSql);
            //mengecek ketersediaan identitas
            if($cek_nama == 0){//jika nama pengguna tidak ditemukan/belum terdaftar
                //lakukan penambahan data
                mysql_query("INSERT INTO Mahasiswa (Nama,NIM,Idline,jkel,UKM) VALUES('$nama','$NIM', '$line', '$jkel', '$pilihukm')");
                echo "Redirecting... <script> swal('Selamat!', 'Pendaftaran Berhasil! Tunggu Info Selanjutnya.', 'success'); setTimeout(function(){location.href='index.php'} , 4000); </script>";
            }else{
                echo "Redirecting... <script> swal('Error!', 'Data Sudah Terdaftar', 'error'); setTimeout(function(){location.href='index.php'} , 3000); </script>";
            }

?>
