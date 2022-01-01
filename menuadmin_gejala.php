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
            <a href="logout.php" class="btn btn-danger ms-auto fw-bold text-light">Logout</a>
        </div>
    </nav>
    <!-- header end -->

    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-left">
                <br>
                <h2 class="text-center fw-normal fs-1 py-4">Daftar Gejala Pada Tanaman Pakcoy</h2>
                <hr>
                <a href="admin_input_gejala.php">
                    <button type="button" class="btn btn-dark">
                        <i class="fa fa-plus"></i><b> Tambah Data</b>
                    </button>
                </a>
                <br><br>
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Gejala</th>
                                <th>Gejala</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <?php
                        $queri = "Select * From gejala";
                        $hasil = mysqli_query($conn, $queri);
                        $id = 0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $id++;
                            echo "      
                                    <tr>  
                                    <td>" . $id . "</td>
                                    <td>" . $data[0] . "</td>  
                                    <td>" . $data[1] . "</td>  
                                    <td><a href=\"admin_delete_gejala.php?id=" . $data[0] . "\"  onclick='return checkDelete()'><i class='fa fa-trash'></i></a>" . "</td>
                                    </tr>";
                        }
                        ?>
                    </table><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Lanjutkan Menghapus Data Terpilih?');
        }
    </script>
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