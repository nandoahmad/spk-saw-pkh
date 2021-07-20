<?php
require_once('config.php');
if($_POST){
    try {
       $sql = "INSERT INTO pengguna (username,password,status) VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['status']."')";
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
         window.location.href='index.php?page=detail%20warga';
         </script>";
}
?>
<div class="row">
     <div class="col-lg-6">
         <form action="" method="POST">
            <!-- <div class="form-group">
                 <label>Nomor</label>
                 <input type="text" value="" class="form-control" name="kd_pengguna">
             </div> -->
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
                 <input type="text" value="" class="form-control" name="status">
             </div>
             <input type="submit" class="btn btn-primary btn-sm" name="create" value="Create">
         </form>
      </div>
</div>