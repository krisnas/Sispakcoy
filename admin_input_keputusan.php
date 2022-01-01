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
                            <button type="button" class="btn btn-dark">
                                <i class="fa fa-chevron-left"></i><b> Kembali</b>
                            </button>
                        </a>
                    </div>
                    <div class="col-sm-8 fw-normal fs-1 py-3">Masukkan Penyakit</div>
                </div>
                <hr>
                <form id="form1" name="form1" method="post" action="admin_input_keputusan.php"></form>
                <br>
                <form id="form1" name="form1" method="post">
                    <div class="form-floating">
                        <select class="form-select" required class="form-control" name="penyakit">
                            <option value="">KP1 Daun Busuk</option>
                            <?php
                            $tampil = "select * from penyakit";
                            $query1 = mysqli_query($conn, $tampil);
                            while ($hasil = mysqli_fetch_array($query1)) {
                                echo "<option value='" . $hasil['namapenyakit'] . "'>" . $hasil['idpenyakit'] . " " . $hasil['namapenyakit'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Pilih Penyakit</label>
                    </div>
                    <br>
                    <label for="sel2"><b>Gejala Penyakit</b></label><br>
                    <form id="form2" name="form2" method="post" action="menu_diagnosa.php">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <?php
                                $tampil = "select * from gejala";
                                $query = mysqli_query($conn, $tampil);
                                while ($hasil = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text py-3">
                                                <input type='checkbox' value="<?= $hasil['gejala'] ?>" name='gejala[]'>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $hasil['gejala'] ?>" readonly>
                                    </div>
                                <?php
                                }
                                ?>
                                <br>
                            </div>
                        </div>

                        <br>
                        <div class="col-12 text-center">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                            $penyakit = $_POST['penyakit'];
                            $gejala = $_POST['gejala'];
                            $jumlah_dipilih = count($gejala);

                            if (count($gejala) == 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Pilih gejala..!!")';
                                echo '</script>';
                                return false;
                            }

                            for ($x = 0; $x < $jumlah_dipilih; $x++) {
                                $hasil = mysqli_query($conn, "INSERT INTO basispengetahuan (namapenyakit, gejala) values('$penyakit','$gejala[$x]')");
                            }
                            echo '<script language="javascript">';
                            echo 'alert("Insert Data Success\\nSilahkan tekan tombol Kembali")';
                            echo '</script>';
                        }
                        ?>
                    </form>
                    <br>
                    <br>
                </form>
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