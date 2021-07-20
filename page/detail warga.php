<?php
require_once('config.php');
 
$query = "SELECT * FROM pengguna";
$urlcrud = "detail warga.php?page=crud/detail warga";
?>
<div class="row">
     <div class="col-lg-12">
     <table class="table table-hover table-bordered" style="margin-top: 10px">
        <tr class="success">
            <th width="50px">No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th style="text-align: center;">Aksi</th>
        </tr>
     <?php
     if($data=mysqli_query($connection,$query)){
        $a=1;
        while($obj=mysqli_fetch_object($data)){
     ?>
        <tr>
            <td><?= $a ?></td>
            <td><?= $obj->username ?></td>
            <td><?= $obj->password ?></td>
           
            <td><?= $obj->status ?></td>
            <td style="text-align: center;">
                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= 'index.php?page=delete%20warga&kd_pengguna='.$obj->kd_pengguna ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                <a href="<?= 'index.php?page=edit%20warga&kd_pengguna='.$obj->kd_pengguna ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
        </tr>
        <?php
        $a++;
        }
     }
     ?>
     </table>
  </div>
</div>