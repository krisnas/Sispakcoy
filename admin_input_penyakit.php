<?php
include('koneksi.php');

if (isset($_SESSION['login_user'])) {
    header("location: about.php");
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- page icon -->
    <link rel="shorcut icon" href="assets/img/logosaw.png">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- fonts custom -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Sispakcoy</title>

</head>

<body>
    <!-- header section -->
    <nav class="navbar navbar-expand-lg shadow fixed-top " style="background-color: #198754;">
        <div class="container-lg">
            <img src="assets/img/logosaw.png" width="50" height="50" alt="logo">
            <a class="navbar-brand fw-bold text-light" href="#">Sispakcoy</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_page.php">Beranda<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="menuadmin_gejala.php">Gejala</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menuadmin_penyakit.php">Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menuadmin_keputusan.php">Keputusan</a>
                    </li>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <button type="button" class="btn btn-danger ms-auto fw-bold text-light" id="myBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</button>
        </div>
    </nav>
    <!-- header end -->

    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-left">
                <br>
                <div class="row g-0">
                    <div class="col-sm-4 py-4">
                        <a href="menuadmin_gejala.php">
                            <button type="button" class="btn btn-secondary">
                                <i class="fa fa-chevron-left"></i><b> Kembali</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-sm-8 fw-normal fs-1 py-3">Masukkan Penyakit</div>
                </div>
                <hr>
                <form class="form-horizontal" method="post" data-toggle="validator" role="form" action="admin_input_penyakit.php">
                    <div class="form-group has-feedback">
                        <p><b>ID Penyakit:</b></p>
                        <div class="col-md-2 mb-3">
                            <input type="text" class="form-control" required name="idpenyakit" data-error="Isi kolom dengan benar">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" role="alert"></div>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <p><b>Nama Penyakit:</b></p>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" required name="namapenyakit" data-error="Isi kolom dengan benar">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors" role="alert"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p><b>Pengendalian Penyakit:</b></p>
                        <div class="col-md-12">
                            <textarea rows='8' class="form-control" name="pengendalian"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center pt-3">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $idpenyakit     = $_POST['idpenyakit'];
                        $namapenyakit   = $_POST['namapenyakit'];
                        $pengendalian   = $_POST['pengendalian'];
                        $query = "INSERT INTO penyakit SET idpenyakit='$idpenyakit',namapenyakit='$namapenyakit',pengendalian='$pengendalian'";
                        $result = mysqli_query($conn, $query);
                        if ($result) {
                            echo '<script language="javascript">';
                            echo 'alert("Insert Data Success\\nSilahkan tekan tombol Kembali")';
                            echo '</script>';
                        }
                    }
                    ?>
                </form><br>
            </div>
        </div>
    </div>
    <!-- footer section -->
    <footer class="footer border-top py-4">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="list-unstylyed list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/" class="btn-floating btn-lg text-dark"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/" class="btn-floating btn-lg text-dark"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.twitter.com/" class=" btn-floating btn-lg text-dark"><i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <footer class="footer py-1">
                    <div class="container-lg">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="m-0 text-center text-muted footer_text">&copy; 2021 sipak<span>coy</span>.</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </footer>
    <!-- footer section end -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>