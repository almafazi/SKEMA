<?php
include 'koneksi.php';
$id = abs((int)$_GET['id']);
$sql = mysql_query("SELECT * FROM Artikel WHERE id='$id'") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	echo 'Blank...!';
}else{
	$data = mysql_fetch_assoc($sql);
}
include 'func/header.php';
?>
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
															 <li><a href="ukm.php?ukm=robotic">UNISI ROOTIC</a></li>
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
									 </ul>
							 </div>
					 </div>


<body>
    	<div class="container-fluid">
         <div class="row" data-brix_class="1482388554894" style="width:70%">
             <article>
							 <em><b> Tanggal : <?php echo $data['tanggal'] ?> </b></em>
                 <h1><?php echo $data['judul'] ?></h1>
                 <p><?php echo nl2br($data['konten']); ?></p>
             </article>
         </div>
     </div>
<?php include "func/footer.php"; ?>
