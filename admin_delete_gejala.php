<?php
    include('koneksi.php');
    $query="DELETE from gejala where idgejala='".$_GET['id']."'";
    mysqli_query($conn, $query);
    header("location:menuadmin_gejala.php");
