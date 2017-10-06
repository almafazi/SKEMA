<?php $ukm = $_GET['ukm'];

session_start();



include "func/header.php";
include "koneksi.php";
 ?>

    <body>
    <style>
    .lihat-daftar h4 {
        color: black;
        margin: 0;
        padding: 5px;
    }

    .lihat-daftar{
      width: 255px;
      text-decoration: none;
      text-align: center;
      background-color: #F2F2F2;
      border-radius: 5px;
      display: inline-block;
      margin-right: 5px;
    }


    .lihat-daftar:hover {
      background-color: #B6B1B1;
      text-decoration: none;
    }

    .lihat-diterima h4 {
        color: white;
        margin: 0;
        padding: 5px;
    }

    .lihat-diterima{
      width: 425px;
      text-decoration: none;
      text-align: center;
      background-color: #0066D8;
      border-radius: 5px;
      display: inline-block;
      margin-right: 20px;
    }


    .lihat-diterima:hover {
      background-color: #00A3D8;
      text-decoration: none;
    }

    .daftar-diterima {
      display: none;
    }

    [data-brix_class="1482337850764"]{
        margin-top: 0;
        margin-right: auto;
        margin-bottom: 0;
        margin-left: auto;
        width: 70%;
    }
    [data-brix_class="1482337831876"]{
        width: 70%;
        margin-top: 0;
        margin-right: auto;
        margin-bottom: 20px;
        margin-left: auto;
    }
    [data-brix_class="1482337737680"]{
        width: 70%;
        margin-top: 0;
        margin-right: auto;
        margin-left: auto;
        margin-bottom: 20px;
    }

    </style>

      <link href="../assets/css/style.css" rel="stylesheet">
    	<div class="container-fluid">
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
       <?php
       $sql = "SELECT * FROM UKM WHERE kode = '$ukm'";
       $kueri = mysql_query($sql);
       while($list = mysql_fetch_assoc($kueri)) {
       ?>
         <div class="row" data-brix_class="1482337737680">
             <div class="col-md-5">
                 <h1>
                     <?php echo $list['nama']; ?>
                 </h1><br>
                 <strong>Pembimbing : <?php echo $list['pembimbing']; ?></strong>
             </div>
             <div class="col-md-2"></div>
             <div class="col-md-5"><img height="200" width="200" src="/RPL/assets/img/UKM/<?php echo $list['logo']; ?>"></div>
         </div>
         <div class="row" data-brix_class="1482337831876">
             <div class="col-md-5">
                 <p><?php echo $list['deskripsi']; ?></p>
             </div>
             <div class="col-md-2"></div>
             <div class="col-md-5">
                 <strong>Kegiatan Rutin</strong>
                 <p><?php echo $list['kegiatan']; ?></p>
             </div>
         </div>
         <div class="row" data-brix_class="1482337850764">
             <div class="col-md-5">
                 <strong>Struktur Organisasi</strong>
                 <p>
                    <?php echo $list['struktur']; ?>
                 </p>
             </div>
             <div class="col-md-2"></div>
             <div class="col-md-5">
                 <strong>Prestasi</strong>
                 <p>
                     <?php echo $list['prestasi']; ?>
                 </p>
             </div>

         </div>
         <div class="row" data-brix_class="1482337850764">
             <div class="col-md-5">
                 <strong>Kontak</strong>
                 <p>Line :
                    <?php echo $list['line']; ?><br>
                    Phone :
                    <?php echo $list['phone']; ?>
                 </p>

             </div>
             <div class="col-md-2"></div>
             <div class="col-md-5">
                 <strong>Jadwal</strong>
                 <p>
                     Pendaftaran : 20 -30 Mei 207. <br>
                     Pengumuman : 05 Juni 2017.
                 </p>
             </div>

         </div>
         <br>
         <div class="row" data-brix_class="1482337850764">
           <div class="col-md-5">
            <h3>Status Pendaftaran : <span class="status"><?php echo ucwords($list['status']); ?></span></h3>
             <a href="javascript:;" class="lihat-diterima"><h4>Lihat Mahasiswa Diterima Periode 2016/2017</h4></a>
           </div>

         </div><br>

<div class="daftar-diterima">

 <div class="row" data-brix_class="1482337850764">
   <div class="col-md-8">
     <h2>Daftar Mahasisa Yang Lolos Seleksi</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Mahasiswa.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Nama</th>
    <th style="width:40%;">NIM</th>
    <th style="width:40%;">JURUSAN</th>
  </tr>
  <?php $sql = "SELECT * FROM Mahasiswa WHERE ukm = '$ukm' AND diterima = 'YA'";
  $kueri = mysql_query($sql);
  while ($row = mysql_fetch_assoc($kueri)) {
   ?>
  <tr>
    <td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['nim'] ?></td>
    <td><?php echo $row['jurusan'] ?></td>
  </tr>
  <?php } ?>
</table>   </div>
</div>

</div>
         <div class="row" data-brix_class="1482337850764">
           <div class="col-md-12">
             <hr>
             <h1 class="text-center">Sekilas <?php echo ucwords($list['nama']); ?></h1>
             <hr>
             <p><?php echo nl2br($list['deskripsi_panjang']); ?></p>
           </div>

         </div>

         <hr>
         <div class="row text-center" data-brix_class="1495027653560">
             <div class="col-md-12">
                 <a href="javascript:;" class="lihat-daftar"><h4>Galeri Foto <br> <?php echo ucwords($list['nama']); ?> </h4>
                 <img height="20" width="90"src="https://nest.com/support/images/misc-assets-icons/nest-menu-icon.png" alt="">
                 </a>

                <?php include 'gambar.php'; ?>


             </div>

         </div>

         <div class="row center-block daftar" data-brix_class="1482252480935">
             <div class="col-md-12" data-brix_class="1495027653560">
                 <h2 data-brix_class="1495027608523" class="media-heading text-center">Daftar <?php echo $list['nama']; ?>&nbsp;!</h2>
             </div>
             <div class="col-md-12 text-center" data-brix_class="1495027653560"><div class="button-container">
               <button type="submit" class="button"><span>DAFTAR</span></button>
             </div>
             </div>
         </div>

         <?php include 'sign-up.php'; ?>

         </div>
            <?php } ?>
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
         </div>
         </div>
         <div class="cek-login" style="display:none;"><?php echo $_SESSION['nama']; ?></div>

         <script type="text/javascript">
         var status = $('.status').text();
         var sesi = $('.cek-login').text();

         $(".button-container .button").click(function() {

           if(!sesi) {
             alert("Anda Harus Login Dulu!, Login Bisa Dilakukan Di Halaman Awal :)");
           } else {
           if(status == "Close") {
             alert('Maaf Pendaftaran Belum Dibuka Untuk Periode ini :)');
           } else {
             $('#id01').css("display", "block");
           }
         }
         });

           $('.lihat-daftar').click(function() {
               $('.containers').slideToggle();
           });



           if(status == "Open") {
             $('.status').css("color", "green");
           } else {
             $('.status').css("color", "red");
           }

           $(".lihat-diterima").click(function() {
             if(status == "Open") {
               alert("Hasil Seleksi Untuk Periode Ini Belum Tersedia!");
             }else {
             $(".daftar-diterima").slideToggle(300);
           }
           });
         </script>

         </body></html>
