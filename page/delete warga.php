<?php
require_once('config.php');
try {
      $sql = "DELETE FROM pengguna WHERE kd_pengguna=".$_GET['kd_pengguna'];
     $connection->query($sql);
} catch (Exception $e) {
      echo $e;
      die();
}
     echo "<script>
     alert('Data berhasil di hapus');
     window.location.href='index.php?page=detail%20warga';
     </script>";
?>