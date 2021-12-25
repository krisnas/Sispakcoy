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

<body class="">
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
                    <li class="nav-item">
                        <a class="nav-link" href="menu_daftar.php">Daftar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Diagnosa<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">Tentang Kami</a>
                    </li>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <button type="button" class="btn btn-light ms-auto fw-bold text-success" id="myBtn" data-toggle="modal" data-target="#modalLoginForm">Login</button>
        </div>
        </div>
    </nav>
    <!-- header end -->

    <div class="container-lg py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-left">
                <br>
                <h2 class="text-center fw-normal fs-1 py-4">Gejala Yang Terjadi Pada Tanaman Pakcoy</h2>
                <hr>
                <form id="form1" name="form1" method="post" action="menu_diagnosa.php"></form>
                <h6>Pilih Gejala Penyakit: </h6>
                <form id="form2" name="form2" method="post" action="menu_diagnosa.php">
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
                    <div class="text-center">
                        <button type="submit" name="submit" onclick="return checkDiagnosa()" class="btn btn-success ">Diagnosa</button><br><br>
                    </div>
                    <hr>
                    <div class="panel panel-info">
                        <div class="panel-heading">Hasil Diagnosa Penyakit</div>
                        <div class="panel-body">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $gejala = $_POST['gejala'];
                                        $jumlah_dipilih = count($gejala);

                                        if ($jumlah_dipilih == 0) {
                                            echo "<script>alert('Gejala harus diceklist..!!')</script>";
                                        } else {
                                            //looping mencari terlebih dahulu gejala yg diceklist
                                            $query = "SELECT * FROM db_sispaksawtih.basispengetahuan where gejala IN (";
                                            for ($x = 0; $x < $jumlah_dipilih; $x++) {
                                                $query .= "'" . $gejala[$x] . "', ";
                                            }
                                            $query = rtrim($query, ', ');
                                            $query = $query . ")";
                                            //dibandingkan antara total yang diceklist dengan total gejala yang ada dipenyakit tersebut
                                            $tampil = "select a.idpenyakit,a.namapenyakit,count(a.gejala) as gejalaA,count(b.gejala)as gejalaB from (
                                                            SELECT a.namapenyakit,a.gejala,b.idpenyakit FROM db_sispaksawtih.basispengetahuan a left join 
                                                            db_sispaksawtih.penyakit b on a.namapenyakit = b.namapenyakit) a left join ($query)B ON a.namapenyakit = b.namapenyakit and a.gejala = b.gejala
                                                            group by a.namapenyakit,a.idpenyakit having count(a.gejala) = count(b.gejala)";
                                            //echo $tampil;

                                            $result = mysqli_query($conn, $tampil);
                                            $hasil  = mysqli_fetch_array($result);
                                            $num_rows = mysqli_num_rows($result);
                                            $gejala = $hasil['gejalaA'];

                                            //cek jika gejala tersebut sama dengan yang diceklist maka data akan muncul
                                            //jika total yang diceklist tidak sama dngan yg ada dibasis pengetahuan makan akan munculkan warning

                                            if ($num_rows == 0 or $x != $gejala) {
                                                echo "<script>
                                                                alert('Penyakit Tidak Ditemukan\\nSilahkan Ulangi Diagnosa :)')
                                                            </script>";
                                            } else {
                                                echo "<script>
                                                                alert('Diagnosa Penyakit Berhasil!\\nSilahkan Cek Tabel Hasil Diagnosa dibawah')
                                                            </script>";
                                                echo "
                                                            <tr>  
                                                            <td>" . $x . "</td>
                                                            <td>" . $hasil['idpenyakit'] . "</td>
                                                            <td>" . $hasil['namapenyakit'] . "</td>  
                                                            <td><a href=\"detail_diagnosa.php?id=" . $hasil['idpenyakit'] . "\"><i class='fa fa-search'></i></a></td>
                                                            </tr>";
                                            }
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
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