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
    <nav class="navbar navbar-expand-lg shadow fixed-top " style="background-color: #5AA86F;">
        <div class="container-lg">
            <img src="assets/img/logosaw.png" width="50" height="50" alt="logo">
            <a class="navbar-brand fw-bold text-light" href="#">Sispakcoy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <a href="logout.php" class="btn btn-danger ms-auto fw-bold text-light">Logout</a>
        </div>
    </nav>
    <!-- header end -->

    <section class="services py-5">
        <div class="container-lg py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h5 class=" fw-bold mb-1">Dashboard</h5>
                        <h2 class="fw-bold mb-5 fs-1 py-4">Admin Sispakcoy</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-4 mb-4 shadow-sm">
                    <a href="menuadmin_gejala.php">
                        <div class="service-item p-4 bg-white">
                            <div class="icon my-3 text-success fs-1">
                                <i class="fas fa-clipboard-list fa-lg"></i>
                            </div>
                            <h3 class="fs-5 py-2 fw-bold">Gejala</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 shadow-sm">
                    <a href="menuadmin_penyakit.php">
                        <div class="service-item p-4 bg-white">
                            <div class="icon my-3 text-success fs-1">
                                <i class="fas fa-viruses"></i>
                            </div>
                            <h3 class="fs-5 py-2 fw-bold">Penyakit</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 shadow-sm">
                    <a href="menuadmin_keputusan.php">
                        <div class="service-item p-4 bg-white">
                            <div class="icon my-3 text-success fs-1">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h3 class="fs-5 py-2 fw-bold">Keputusan</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->


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
</body>

</html>