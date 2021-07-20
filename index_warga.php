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
    <title>Perekrutan warga Baru</title>
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
                    <a class="navbar-brand" href="#"><?php $str = (isset($_GET["page"])) ? (($_GET["page"] == "nilai") ? "persyaratan" : $_GET["page"]) : "home_warga"; echo strtoupper($str)?></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?page=home_warga"><i class="glyphicon glyphicon-home"></i>Beranda </span></a></li>
                        <li><a href="?page=isi_biodata"><i class="glyphicon glyphicon-edit"></i>Isi Biodata </span></a></li>
                        <li><a href="?page=upload_berkas&kd_pengguna&username=<?=$_SESSION['username']?>"><i class="glyphicon glyphicon-book"></i> Upload Berkas <span class="sr-only"></span></a></li>
                    </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" style="font-weight: bold; color: red;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-check"></i>Hasil Akhir <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <?php $query = $connection->query("SELECT * FROM jenis_bantuan"); while ($row = $query->fetch_assoc()): ?>
                              <li><a href="?page=perhitungan&jenis_bantuan=<?=$row["kd_jenis_bantuan"]?>"><?=$row["nama"]?></a></li>
                            <?php endwhile; ?>
                          </ul>
                        </li>
                        <!-- <li><a href="?page=pengumuman">Pengumuman</a></li> -->
                        <li><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                        <li><a href="#">|</a></li>
                        <li><a href="#" style="font-weight: bold; color: red;"><i class="glyphicon glyphicon-user"></i><?= ucfirst($_SESSION["username"]) ?></a></li>
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
