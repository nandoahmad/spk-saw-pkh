<?php 
    require_once "config.php";
?>
<h3>Berkas Warga</h3>
<div class="row">
     <div class="col-lg-12">
     <table id="tabel-data" class="table table-hover table-bordered" style="margin-top: 10px">
        <thead>
        <tr class="success">
        <th width="30">No</th>
        <th width="180">Berkas</th>
        <th width="80">Aksi</th>
        <th width="80">Hapus Berkas</th>
        </tr>  
        </thead>
        <tbody>
        <?php
         $query = "SELECT * FROM berkas";
     if($data=mysqli_query($connection,$query)){
        $a=1;
        while($obj=mysqli_fetch_object($data)){
     ?>
        <tr>
            <td><?= $a ?></td>
            <td><?= $obj->nama_berkas?></td>
            <td><a href="<?='./proses/proses_download.php?nama_berkas='.$obj->nama_berkas ?>">Download</a></td>
            <td><a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= 'index.php?page=../proses/proses_hapus_file&nama_berkas='.$obj->nama_berkas ?>" class="btn btn-danger btn-sm">Hapus</span></a></td>
        </tr>
        <?php
        $a++;
        }
     }
     ?>    
        </tbody>
          
</table>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>