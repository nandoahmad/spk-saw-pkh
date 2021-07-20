<?php
require_once('config.php');
if($_POST){
    try {
       $sql = "INSERT INTO pengguna (username,password,status) VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['status']."')";

       mysqli_query($konek,"INSERT INTO warga (username) VALUES ('".$_POST['username']."')");

       if(!$connection->query($sql)){
          echo $connection->error;
          die();
        }
    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         alert('Data berhasil di simpan');
         window.location.href='login.php';
         </script>";
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perekrutan warga Baru</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 160px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center">Tambah User</h3></div>
                        <div class="panel-body">
                             <form action="" method="POST">
                                 <div class="form-group">
                                     <label>Username</label>
                                     <input type="text" value="" class="form-control" name="username">
                                 </div>
                                 <div class="form-group">
                                     <label>Password</label>
                                     <input type="text" value="" class="form-control" name="password">
                                 </div>
                                 <div class="form-group">
                                     <label>Status</label>
                                     <input type="text" value="warga" readonly="" class="form-control" name="status">
                                 </div>
                                 <input type="submit" class="btn btn-primary btn-sm" name="create" value="Simpan">
                             </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    
</body>