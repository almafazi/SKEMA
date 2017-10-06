<?php
include 'connect.php';
session_start();
$users = $_SESSION['nama_ukm'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $kode = $_POST['kode'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];
  $tentang = $_POST['tentang'];
  $deskripsi_panjang = $_POST['deskripsi_panjang'];
  $pembimbing = $_POST['pembimbing'];
  $prestasi = $_POST['prestasi'];
  $kegiatan = $_POST['kegiatan'];
  $idline= $_POST['idline'];
  $twitter= $_POST['twitter'];
  $instagram= $_POST['instagram'];
  $facebook= $_POST['facebook'];
  $struktur= $_POST['struktur'];
  $image= $_POST['image'];
  $image_logo= $_POST['image-logo'];
  $status= $_POST['status'];

  $_FILES["image"]["name"];
  $_FILES["image-logo"]["name"];

  $temp = explode(".", $_FILES["image"]["name"]);
  $fileName = $users. '.' . end($temp);
  if($_FILES["image"]["name"]) {$gambar = ",foto = '".$fileName."'";} else { $gambar = "";}

  $temp1 = explode(".", $_FILES["image-logo"]["name"]);
  $fileName1 = 'logo_'.$users. '.' . end($temp1);
  if($_FILES["image-logo"]["name"]) { $gambar1 = ",logo= '".$fileName1."'";} else { $gambar1 = "";}

  $sql = "UPDATE UKM SET

  nama = '$nama',
  kode = '$kode',
  kategori = '$kategori',
  deskripsi = '$deskripsi',
  tentang = '$tentang',
  deskripsi_panjang = '$deskripsi_panjang',
  pembimbing = '$pembimbing',
  prestasi = '$prestasi',
  phone = '$phone',
  idline = '$idline',
  twitter = '$twitter',
  facebook = '$facebook',
  struktur = '$struktur',
  status = '$status',
  instagram = '$instagram'".
  $gambar
  .$gambar1."

  WHERE kode = '$users'";

	$kuery = mysql_query($sql) or die(mysql_error($link));
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

  if($_FILES["image"]["name"]){
if(file_exists('../assets/img/UKM/'.$users.'.png')) {
      chmod('../assets/img/UKM/'.$users.'.png',0755);
      unlink('../assets/img/UKM/'.$users.'.png');
  } else if(file_exists('../assets/img/UKM/'.$users.'.jpg')) {
        chmod('../assets/img/UKM/'.$users.'.jpg',0755);
        unlink('../assets/img/UKM/'.$users.'.jpg');
      }
    }
          if($_FILES["image-logo"]["name"]){
if(file_exists('../assets/img/UKM/logo_'.$users.'.png')) {
          chmod('../assets/img/UKM/logo_'.$users.'.png',0755);
          unlink('../assets/img/UKM/logo_'.$users.'.png');
      } else if(file_exists('../assets/img/UKM/logo_'.$users.'.jpg')) {
            chmod('../assets/img/UKM/logo_'.$users.'.jpg',0755);
            unlink('../assets/img/UKM/logo_'.$users.'.jpg');
        }
      }

      if($_FILES["image"]["name"]){
  $temp = explode(".", $_FILES["image"]["name"]);
  $newfilename = $users. '.' . end($temp);
  move_uploaded_file($_FILES['image']['tmp_name'], "../assets/img/UKM/".$newfilename);
}
  if($_FILES["image-logo"]["name"]){
  $temp1 = explode(".", $_FILES["image-logo"]["name"]);
  $newfilename1 = 'logo_'.$users. '.' . end($temp1);


  move_uploaded_file($_FILES['image-logo']['tmp_name'], "../assets/img/UKM/".$newfilename1);

}}


?>
