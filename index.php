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

<body class="">
    <!-- header section -->
    <nav class="navbar navbar-expand-lg shadow fixed-top " style="background-color: #5AA86F;">
        <div class="container-lg">
            <img src="assets/img/logosaw.png" width="50" height="50" alt="logo">
            <a class="navbar-brand fw-bold text-light" href="#">Sispakcoy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <button type="button" class="btn btn-light ms-auto fw-bold text-success" id="myBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
        </div>
    </nav>
    <!-- header end -->

    <!-- service section -->
    <section class="services py-5">
        <div class="container-lg py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h5 class=" fw-bold mb-1">Welcome!</h5>
                        <h2 class="fw-bold mb-5 fs-1 py-4">Diagnosa Penyakit Tanaman Pakcoy</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-4 mb-4 shadow-sm">
                    <a href="menu_daftar.php">
                        <div class="service-item p-4 bg-white">
                            <div class="icon my-3 text-success fs-1">
                                <i class="fas fa-clipboard-list fa-lg"></i>
                            </div>
                            <h3 class="fs-5 py-2 fw-bold">Daftar Penyakit</h3>
                            <p class="text-muted fs-5">Anda Dapat Melihat Daftar Penyakit Pada Tanaman Pakcoy</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 shadow-sm">
                    <a href="menu_diagnosa.php">
                        <div class="service-item p-4 bg-white">
                            <div class="icon my-3 text-success fs-1">
                                <i class="fas fa-stethoscope fa-lg"></i>
                            </div>
                            <h3 class="fs-5 py-2 fw-bold">Diagnosa Penyakit</h3>
                            <p class="text-muted fs-5">Anda Dapat Mengecek Gejala Yang Terjadi Pada Tanaman Pakcoy</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 shadow-sm">
                    <a href="about_us.php">
                        <div class="service-item p-4 bg-white">
                            <div class="icon my-3 text-success fs-1">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                            <h3 class="fs-5 py-2 fw-bold">Tentang Kami</h3>
                            <p class="text-muted fs-5">Anda Dapat Melihat Biodata Tentang Kami</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <svg class="col-md-12 mx-auto" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <h5 class="modal-title text-center">Admin</h5>
                    <form role="form" method="post" action="validasilogin.php">
                        <div class="form-group" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="col-12 text-center pt-3">
                                <button type="submit" id="submit" class="btn btn-success" method="post">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

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