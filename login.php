   
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perekrutan warga Baru</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 160px;
            background-image: url('assets/images/bg1.jpg');

        }
        .link{
            margin-top:30px;
        }
        .link a{
            list-style: none;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <form action="./proses/cek_login.php" method="post"><!DOCTYPE html>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center"><b>APLIKASI PENDUKUNG KEPUTUSAN BAGI CALON PENERIMA BANTUAN PKH <b></h3></div>
                    <div class="panel-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="username" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                        </form>
                        <?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan']=="gagal"){
                            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                            }
                         }
                    ?>
                    <div class="link">
                        <a href="tambah_user.php">Buat Akun Baru</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>
