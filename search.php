<?php
$q = $_GET['q'];
include 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="editor" content="brix.io">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="642346941780-0ard923i091616lmeae1n3vo9tfo1gnh.apps.googleusercontent.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="/RPL/assets/js.js"></script>
        <title>My page</title>

        <!-- Bootstrap -->
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">


        <!-- User -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="style-auto.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!--[endif]---->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    </head>
    <body data-brix_class="1482248775901">
    	<div class="container-fluid" data-brix_class="1482251079029">
         <div class="container">
<div class="row" data-brix_class="1482260028977">
    <div class="col-md-3"><a href="/RPL/"><img src="assets/img/skema.png" data-brix_class="1482250870894"></a></div>
    <div class="col-md-7">
      <div class="search-bar-isi">
        <form class="" action="search.php" method="get">
          <input type="text" name="q" placeholder="Cari UKM..">
        </form>
      </div>
    </div>
    <div class="col-md-2 text-center">
        <ul class="nav nav-pills pull-right" data-brix_class="1482258431563">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Daftar UKM <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <p>&nbsp;&nbsp;&nbsp;Akademik</p>
                    </li>
                    <li><a href="ukm.php?ukm=robotic">UNISI ROBOTIC</a></li>
                    <br>
                    <li>
                        <p>&nbsp;&nbsp;&nbsp;Non Akademik</p>
                    </li>
                    <li><a href="ukm.php?ukm=mb">Marching Band</a></li>
                    <li><a href="#">Mapala</a></li>
                    <li><a href="#">Bulu Tangkis</a></li>
                    <li><a href="#">Unisi Musik</a></li>
                    <li><a href="#">Unisi Volley</a></li>
                    <li><a href="#">PSMMV</a></li>
                    <li><a href="#">Karate</a></li>
                </ul>
            </li>

            <div class="user-info">
<?php
if (isset($_SESSION['nama'])) {
 $namauser = $_SESSION['nama'];
?>
<li><a href="javascript:;" class="userdata"><img class="header__avatar" src="<?php echo $_SESSION['img']; ?>"></a>
 <ul class="drop-user" style="position: fixed">
       <li><a class="logout" href="#"> Logout </a><div></div></li>
 </ul>
</li>
 <?php } ?>
</div>
        </ul>
    </div>
</div>
<hr>

<style>
.container-daftar {
    width: 100%;
    margin: auto;
}

.card-daftar {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 270px;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: inline-block;
}

.container-daftar {
  padding: 0 16px;
}

.container-daftar::after {
  content: "";
  clear: both;
  display: table;
}

.card-daftar .title {
  color: grey;
  font-size: 18px;
}

.card-daftar button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card-daftar a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.card-daftar button:hover, .card-daftar a:hover {
  opacity: 0.7;
}
</style>
<div class="container-daftar">

<h3>Hasil Pencarian : <b> <?php echo $q; ?></b></h3>
<?php
$sql = "SELECT * FROM UKM WHERE nama LIKE '%$q%'";
$kueri = mysql_query($sql);
$ada= mysql_num_rows($kueri);
if($ada == 1) {

while($row = mysql_fetch_assoc($kueri)) {
 ?>
<div class="card-daftar">
  <img src="/RPL/assets/img/UKM/<?php echo $row['foto']; ?>"  style="width:100%;height: 230px;">
  <div class="container-daftar">
    <h1 style="font-size:30px;"><?php echo $row['nama']; ?></h1>
    <p class="title"><?php echo $row['tentang']; ?></p>
    <p><?php echo $row['kategori']; ?></p>
    <div style="margin: 24px 0;">
      <a href="<?php echo $row['twitter']; ?>"><i class="fa fa-twitter"></i></a>
      <a href="<?php echo $row['instagram']; ?>"><i class="fa fa-instagram"></i></a>
      <a href="<?php echo $row['facebook']; ?>"><i class="fa fa-facebook"></i></a>
   </div>
   <p><button onclick="location.href = '/RPL/ukm.php?ukm=<?php echo $row["kode"]; ?>';">Daftar UKM</button></p>
  </div>
</div>
<?php } } else {
  echo "<div style='height:300px'>Pencarian tidak ditemukan, silahkan coba dengan keyword lain  :(</div>";
} ?>

</div>

</div> <br>



<div class="row" data-brix_class="1482259151323">
    <div class="col-md-6">
        <h1 data-brix_class="1482259214406">Pusat UKM Mahasiswa (SKEMA)</h1>
    </div>
    <div class="col-md-6">
        <footer class="pull-right" data-brix_class="1482261489230">
            <small data-brix_class="1482259314034">
                © 2016 by SKEMA.&nbsp;&nbsp;&nbsp; <br>
            </small>
            <img class="clearfix" src="/RPL/assets/img/fb.png"><img src="/RPL/assets/img/tw.png"><img src="/RPL/assets/img/g+.png">
        </footer>
    </div>
</div></div></div></body></html>
