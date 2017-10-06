
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">

<script src="fancybox/jquery.fancybox.js"></script>

<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>

<style type="text/css">
.containers {
  display: none;
}
.gallery-body img {
    width: 282px;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
    margin-bottom: 5px;
}
 @media only screen and (max-width: 500px) {
   .gallery-body img {
       width: 190px;
   }
 }
</style>

<div class="containers" style="margin:auto;width:100%;">
	<h1>Galeri Foto UKM : <b style="color:red"> <?php echo ucwords($ukm); ?> </b></h1>
    <div class="gallery-body">
        <?php
        //Menyertakan file konfigurasi database
        include('konfigDb.php');

        //mengambil gambar dari database
        $query = $db->query("SELECT * FROM gambar WHERE ukm = '$ukm'");

        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageThumbURL = '/RPL/gambar/'.$row["nama_file"];
                $imageURL = '/RPL/gambar/'.$row["nama_file"];
        ?>
            <a href="<?php echo $imageURL; ?>" data-fancybox="group" data-caption="<?php echo $row["judul"]; ?>" >
                <img src="<?php echo $imageThumbURL; ?>" alt="" />
            </a>
        <?php }
        } ?>
    </div>
</div>
