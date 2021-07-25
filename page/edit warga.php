<?php
require_once('config.php');
if($_POST){
        $sql ="UPDATE pengguna SET username='".$_POST['username']."', password='".md5($_POST['password'])."',  email='".$_POST['email']."', status='".$_POST['status']."' WHERE kd_pengguna='".$_GET['kd_pengguna']."'";
        if ($connection->query($sql) === TRUE) {
           echo "<script>   
           alert('Data berhasil di update');
           window.location.href='index.php?page=detail%20warga';
           </script>";
        } else {
           echo "Gagal: " . $connection->error;
        }
        $connection->close(); 
}else{
        $query = $connection->query("SELECT * FROM pengguna WHERE kd_pengguna=".$_GET['kd_pengguna']);
        if($query->num_rows > 0){
           $data = mysqli_fetch_object($query);
        }else{
           echo "data tidak tersedia";
           die();
        }
?>
<div class="row">
    <div class="col-lg-6">
         <form action="" method="POST">
         <input type="hidden" name="kd_pengguna" value="<?= $data->id ?>">
         <div class="form-group">
             <label>Username</label>
             <input type="text" value="<?= $data->username ?>" class="form-control" name="username">
         </div>
         <div class="form-group">
             <label>Password</label>
             <input type="text" value="<?= $data->password ?>" class="form-control" name="password">
         </div>
         <div class="form-group">
             <label>Status</label>
             <input type="text" value="<?= $data->status ?>" class="form-control" name="status">
         </div>
         <input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
         </form>
      </div>
</div>
<?php
}
mysqli_close($connection);
?>