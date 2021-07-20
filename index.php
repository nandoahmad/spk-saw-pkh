<?php
session_start();
require_once "config.php";
if (!isset($_SESSION["is_logged"])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK-Bantuan PKH</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.chained.min.js"></script>
    <style>
        body {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><?php $str = (isset($_GET["page"])) ? (($_GET["page"] == "nilai") ? "persyaratan" : $_GET["page"]) : "home"; echo strtoupper($str)?></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="?page=home" > <i class="glyphicon glyphicon-home"></i> Beranda<span class="sr-only">(current)</span></a></li>
                        <li><a href="?page=download"> <i class="glyphicon glyphicon-book"></i> Berkas <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i>Calon Penerima<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="?page=detail warga">Detail Calon Penerima</a></li>
                            <li><a href="?page=tambah warga">Tambah User Calon Penerima</a></li>
                        </ul>
                    </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" style="font-weight: bold; color: green;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-check"></i> Perhitungan <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <?php $query = $connection->query("SELECT * FROM jenis_bantuan"); while ($row = $query->fetch_assoc()): ?>
                              <li><a href="?page=perhitungan&jenis_bantuan=<?=$row["kd_jenis_bantuan"]?>"><?=$row["nama"]?></a></li>
                            <?php endwhile; ?>
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-edit"></i>Input <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="?page=jenis_bantuan">Jenis Bantuan</a></li>
                            <li><a href="?page=warga">Data Calon Penerima</a></li>
                            <li><a href="?page=kriteria">Kriteria</a></li>
                            <li><a href="?page=model">Model</a></li>
                            <li><a href="?page=penilaian">Penilaian</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=nilai">Perhitungan</a></li>
                          </ul>
                        </li>
                        <!-- <li><a href="?page=pengumuman">Pengumuman</a></li> -->
                        <li><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                        <li><a href="#">|</a></li>
                        <li><a href="#" style="font-weight: bold; color: red;"> <i class="glyphicon glyphicon-user"></i> <?= ucfirst($_SESSION["username"]) ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-md-12">
              <?php include page($_PAGE); ?>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
