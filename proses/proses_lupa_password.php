<?php
require_once('config.php');
if($_POST){
    try {
        $sql = mysqli_query($konek, "SELECT kd_pengguna, email, COUNT(email) AS jumlah FROM pengguna WHERE email = '$_POST[email]'");
        
        $data = mysqli_fetch_assoc($sql);

        if ($data['jumlah'] > 0) {
            // ini_set( 'display_errors', 1 );
            // error_reporting( E_ALL );
            $from = "grindrevoez@gmail.com";
            $to = $data['email'];
            $subject = "Reset Password SPK SAW Grandcity";
            $message = "Untuk mereset password silahkan klik link berikut : http://localhost/reset_password.php?kd_pengguna=$data[kd_pengguna]'>";
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
            echo"
            <script>
            alert('Silahkan cek email anda.');
            </script>
            ";
        }else{
            echo"
            <script>
            alert('Email tidak ditemukan');
            </script>
            ";
        }
        // print_r($data['email']);

    } catch (Exception $e) {
      echo $e;
      die();
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 40px;
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
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center">Lupa Password</h3></div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Masukan Email</label>
                                <input type="email" name="email" class="form-control" id="email" required placeholder="Email" autofocus="on">
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Kirim</button>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>