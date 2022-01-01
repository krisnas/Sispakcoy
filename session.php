<?php
    include "koneksi.php";
    session_start();

    $user_check=$_SESSION['login_user'];
    $sql="select * from admin where username='$user_check'";
    $ses=mysqli_query($conn,$sql);
    $row =mysqli_fetch_assoc($ses);
    $login_session =$row['nama'];

    if(!isset($_SESSION)){
        echo"$user_check";
    }
