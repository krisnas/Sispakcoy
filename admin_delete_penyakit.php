<?php
    include('koneksi.php');
    $query="DELETE from penyakit where idpenyakit='".$_GET['id']."'";
    mysqli_query($conn, $query);
    header("location:menuadmin_penyakit.php");
