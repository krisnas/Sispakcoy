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
    <!-- chat bot -->
</head>

<body>
    <!-- header section -->
    <nav class="navbar navbar-expand-lg shadow fixed-top " style="background-color: #5AA86F;">
        <div class="container-lg">
            <img src="assets/img/logosaw.png" width="50" height="50" alt="logo">
            <a class="navbar-brand fw-bold text-light" href="#">Sispakcoy</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Daftar<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu_diagnosa.php">Diagnosa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">Tentang Kami</a>
                    </li>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <button type="button" class="btn btn-light ms-auto fw-bold text-success" id="myBtn" data-bs-toggle="modal" data-bs-target="#modalLoginForm">Login</button>
        </div>
    </nav>
    <!-- header end -->

    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-left">
                <br>
                <h2 class="text-center">Detail Penyakit Pada Tanaman Pakcoy</h2>
                <hr>
                <div class="form-group" method="POST">
                    <p><b>ID Penyakit:</b></p>
                    <div class="col-md-15">
                        <?php
                        $tampil = "SELECT * FROM penyakit where idpenyakit='" . $_GET['id'] . "'";
                        $sql = mysqli_query($conn, $tampil);
                        while ($data = mysqli_fetch_array($sql)) {
                            echo "<input type='text'  class='form-control' id='idpenyakit' readonly value='" . $data['idpenyakit'] . "'><br>";
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group" method="POST">
                    <p><b>Nama Penyakit:</b></p>
                    <div class="col-md-15">
                        <?php
                        $tampil = "SELECT * FROM penyakit where idpenyakit='" . $_GET['id'] . "'";
                        $sql = mysqli_query($conn, $tampil);
                        while ($data = mysqli_fetch_array($sql)) {
                            echo "<input type='text'  class='form-control' id='namapenyakit' readonly value='" . $data['namapenyakit'] . "'><br>";
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group" method="POST">
                    <p><b>Gejala Penyakit:</b></p>
                    <div class="col-md-15">
                        <?php
                        $tampil = "SELECT * FROM penyakit p, basispengetahuan b where p.idpenyakit='" . $_GET['id'] . "' and p.namapenyakit=b.namapenyakit";
                        $sql = mysqli_query($conn, $tampil);
                        while ($data = mysqli_fetch_array($sql)) {
                            echo "<input type='text'  class='form-control' id='jenistanaman' readonly value='" . $data['gejala'] . "'><br>";
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group" method="POST">
                    <p><b>Solusi:</b></p>
                    <div class="col-md-15">
                        <?php
                        $tampil = "SELECT * FROM penyakit where idpenyakit='" . $_GET['id'] . "'";
                        $sql = mysqli_query($conn, $tampil);
                        while ($data = mysqli_fetch_array($sql)) {
                            echo "<textarea  rows='8' class='form-control' id='pengendalian'  readonly>" . $data['pengendalian'] . "</textarea><br>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                            <h4 class="modal-title w-100 font-weight-bold">Admin Login</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                            <form role="form" method="post" action="validasilogin.php">
                                <div class="form-group" method="post">
                                    <label for="username"><span class="glyphicon glyphicon-user"></span> User ID</label>
                                    <input type="text" class="form-control" name="username" id="password" placeholder="Masukkan Username">
                                </div>
                                <div class="form-group" method="post">
                                    <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Kata Sandi</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                                </div>
                                <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
                            </form>
                        </div>
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
                                        <p class="m-0 text-center text-muted footer_text">&copy; 2021 sispak<span>coy</span>.</p>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </footer>
            <!-- footer section end -->

            <script language="JavaScript" type="text/javascript">
                function checkDiagnosa() {
                    return confirm('Apakah sudah benar gejalanya?');
                }
            </script>

</body>

</html>