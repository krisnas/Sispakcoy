<?php
    include('koneksi.php');
    $username= $_POST['username'];
    $password=$_POST['password'];
    $error='';
    session_start();
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
    $result = $conn->query($query) or die($conn->error.__LINE__);

    if($result->num_rows > 0) {
        session_start();
        $_SESSION['login_user']=$username;
        header('location:admin_page.php');
    } else {
        header('location:index.php');
    }
