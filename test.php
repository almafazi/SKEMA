<?php
session_start();

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nim'] = str_replace("@students.uii.ac.id", "", $_SESSION['email']);
        $_SESSION['nama'] = $_POST['nama'];
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['img'] = $_POST['img'];


?>
