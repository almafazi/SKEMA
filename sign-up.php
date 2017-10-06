<?php session_start(); ?>

<style>
/* Full-width input fields */
.form-daftar input[type=text], .form-daftar input[type=password], .form-daftar textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.form-daftar button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.form-daftar .cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.form-daftar .cancelbtn, .form-daftar .signupbtn {float:left;width:50%}

/* Add padding to container elements */
.form-daftar .container-daftar {
    padding: 16px;
}

/* The Modal (background) */
.form-daftar .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.form-daftar .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.form-daftar .close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.form-daftar .close:hover,
.form-daftar .close:focus {
    color: red;
    cursor: pointer;
}

/* Clear floats */
.form-daftar .clearfix::after {
    content: "";
    clear: both;
    display: table;
}

</style>

<div class="form-daftar">

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="TUTUP">×</span>
  <form class="modal-content animate" action="/RPL/init/proses_signup.php" method="post">
    <div class="container-daftar">
      <h2> Form Pendaftaran UKM <?php echo '<b>'.ucwords($ukm).'</b>' ?> </h2>
      <label><b>Email</b></label>
      <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" readonly>

      <label><b>NIM</b></label>
      <input type="text" name="nim" value="<?php echo $_SESSION['nim']; ?>" readonly>

      <label><b>Nama Lengkap</b></label>
      <input type="text" placeholder="Nama Lengkap" value="<?php echo $_SESSION['nama']; ?>" name="nama" required readonly>

      <label><b>ID Line</b></label>
      <input type="text" placeholder="ID Line" name="idline" required>

      <label><b>Tempat Tanggal Lahir</b></label>
      <input type="text" placeholder="Tempat Tanggal Lahir" name="ttl" required>

      <label><b>Jurusan</b></label>
      <input type="text" placeholder="Jurusan" name="jurusan" required>

      <label><b>Fakultas</b></label>
      <input type="text" placeholder="Fakultas" name="fakultas" required>

      <label><b>Motivasi Mengikuti</b></label>
      <textarea placeholder="Motivasi anda mengikuti UKM <?php echo $ukm; ?> " name="motivasi" required></textarea>

      <input type="hidden" name="ukm" value="<?php echo $ukm; ?>">


      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Batal</button>
        <button type="submit" class="signupbtn">Daftar</button>
      </div>
    </div>
  </form>
</div>

</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
