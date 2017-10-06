<?php
include 'connect.php';
session_start();
$users = $_SESSION['nama_ukm'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])){
  $judul = $_POST['judul'];
  $tanggal = $_POST['tanggal'];
  $artikel = nl2br($_POST['konten']);

  $sql = "INSERT INTO Artikel(judul,tanggal,penerbit,konten) VALUES
  (
  '$judul',
  '$tanggal',
  '$users',
  '$artikel'
  )";

	$kuery = mysql_query($sql) or die(mysql_error($link)) or die(mysql_error());
  if($kuery){
  echo '
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
    <style>
  .loader {
  border: 12px solid #f3f3f3;
  border-radius: 50%;
  border-top: 12px solid #E23335;
  border-bottom: 12px solid #E23335;
  width: 80px;
  height: 80px;
  margin: auto;
  margin-top: 190px;
  animation: spin 2s linear infinite;
  }

  @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
  }
  </style>

  <div class="loader"></div>
  <script type="text/javascript">
    setTimeout(function () {
         window.history.back();
      }, 1500);
  </script>
    </body>
  </html>
  ';
} else { echo 'error'; }

}

?>
