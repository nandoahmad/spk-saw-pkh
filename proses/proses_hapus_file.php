<?php

require_once('config.php');
try {
      $sql = "DELETE FROM berkas WHERE nama_berkas='".$_GET['nama_berkas']."'";
      // echo $sql;
     $connection->query($sql);
} catch (Exception $e) {
      echo $e;
      die();
}
     echo "<script>
     alert('Data berhasil di hapus');
     window.location.href='index.php?page=download';
     </script>";
?>