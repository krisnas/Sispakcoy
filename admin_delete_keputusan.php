<?php
    include('koneksi.php');
    $query="DELETE from basispengetahuan where namapenyakit='".$_GET['id']."'";
    mysqli_query($conn, $query);
    header("location:menuadmin_keputusan.php");
