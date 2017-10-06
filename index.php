<?php include 'koneksi.php';
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

        <script language='JavaScript'>
        var txt="SKEMA - Pusat UKM Mahasiswa ";
        var speed=300;
        var refresh=null;
        function action() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        refresh=setTimeout("action()",speed);}action();
        </script>

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
                 <div class="col-md-6"><a href="/RPL/"><img src="assets/img/skema.png" data-brix_class="1482250870894"></a></div>
                 <div class="col-md-6 text-center">
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
                                 <br>
                                 <li>
                                     <p>&nbsp;&nbsp;&nbsp;<a href="/RPL/daftar-ukm.php">Lihat Semua</a></p>
                                 </li>
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
             <div class="row" data-brix_class="1482252480935">

               <?php include 'slider.php'; ?>
             </div>
             <div class="row center-block daftar" data-brix_class="1482252480935">
                 <div class="col-md-12" data-brix_class="1495027653560">
                     <h2 data-brix_class="1495027608523" class="media-heading text-center">Ayo Pilih UKM Kesukaanmu!&nbsp;</h2>
                 </div>
                 <style> #my-signin2 .abcRioButton {margin : auto;}</style>
                 <div class="col-md-12 text-center" data-brix_class="1495027653560"><div id="my-signin2"></div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12">
                   <form action="/RPL/search.php" method="get">
                     <div class="col-lg-12 col-md-12 col-sm-12 float-none col-xs-12" style="text-align:center;">
                     <input id="pac-input" class="controls" type="text" name="q" placeholder="Cari UKM..">
                   </form>

		            </div>

                 </div>
             </div>
             <div class="row" data-brix_class="1495032777883">
                 <div class="col-md-11 center-block float-none" data-brix_class="1495032703902">
                     <div class="head-scroll">
                         <h3 class="kartu-h3">UKM TERPOPULER</h3>
                         <span class="kartu-span push"><a href="/RPL/daftar-ukm.php"> Show all </a></span>
                     </div>

                     <div class="scrollmenu">
                       <?php
                       $sql = "SELECT * FROM UKM LIMIT 10";
                      $kueri = mysql_query($sql);
                      while($list = mysql_fetch_assoc($kueri)) {
                        ?>
                       <a href="/RPL/ukm.php?ukm=<?php echo $list['kode']; ?>">
                             <div class="kartu-container">
                                 <img width="100%" height="100%" src="/RPL/assets/img/UKM/<?php echo $list['foto']; ?>" class="kartu-image">
                                 <div class="gambar-overlay"><span class="ket-gambar-tag"><?php echo $list['kategori']; ?></span><span class="ket-gambar-nama"><?php echo $list['nama']; ?></span></div>
                                 <div class="kartu-overlay">
                                     <div class="kartu-text">Lihat UKM</div>
                                 </div>
                             </div>
                         </a>

                      <?php } ?></div>
                 </div>
             </div>
             <div class="row">
               <strong style="float:left" data-brix_class="1482258731094">Pengumuman</strong><br>
               <div style="clear:both;"></div>
                 <div class="col-md-6" style="overflow-y: scroll;height: 240px;">
                   <?php
                   $sql = "SELECT * FROM Artikel LIMIT 10";
                   $kueri = mysql_query($sql);

                   while ($baris = mysql_fetch_assoc($kueri)) {
                   echo '
                                        <article>
                                          <blockquote>
                                              <span style="color:#717070">'.$baris['tanggal'].'</span></br>
                                              <a href="single.php?id='.$baris['id'].'" style="text-decoration:none"><strong>'.$baris['judul'].' </strong></a>
                                              <p>'.substr($baris['konten'], 0, 60).'...</p>
                                          </blockquote>

                                        </article> ';
                                      }
                    ?>


                 </div>
                 <div class="col-md-6">
                     <h1>
                         Supported by:<br>
                     </h1>
                     <span data-brix_class="1482258916572">
                         Lembaga Eksekutif Mahasiswa<br>
                         Universitas Islam Indonesia<br>
                     </span><img class="img-circle pull-right img-responsive" src="assets/img/hmtf_logo.jpg" data-brix_class="1482341540080"><img class="img-circle pull-right img-responsive" src="assets/img/Logo-UII-Biru-BACKGROUND-TERANG.png" data-brix_class="1482341540080">
                 </div>
             </div>

      <script>
     function onSuccess(googleUser) {
       var nama = googleUser.getBasicProfile().getName();
       var id = googleUser.getBasicProfile().getId()
       var img = googleUser.getBasicProfile().getImageUrl()
       var email = googleUser.getBasicProfile().getEmail()

       var feriv = email.search("students.uii.ac.id");

       if(feriv > 0) {
                $.ajax({
                  type: "POST",
                  data: {nama : nama, id : id, img : img, email : email},
                  url: 'test.php',
                  success: function(data) {
                    alert("Anda Sukses Login !" + nama);
                  }
                });
       } else {
         alert("Anda Harus Mahasiswa UII!");
         onFailure();
       }

     }

     function onFailure(error) {
       console.log(error);
     }


     function renderButton() {
       gapi.signin2.render('my-signin2', {
         'scope': 'profile email',
         'width': 240,
         'height': 50,
         'longtitle': true,
         'theme': 'dark',
         'onsuccess': onSuccess,
         'onfailure': onFailure
       });
     }
   </script>

   <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>




             <?php include 'func/footer.php'; ?></html>
