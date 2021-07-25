<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM jenis_bantuan WHERE kd_jenis_bantuan='$_GET[key]'");
	$row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$validasi = false; $err = false;
	if ($update) {
		$sql = "UPDATE jenis_bantuan SET nama='$_POST[nama]' WHERE kd_jenis_bantuan='$_GET[key]'";
	} else {
		$sql = "INSERT INTO jenis_bantuan VALUES (NULL, '$_POST[nama]')";
		$validasi = true;
	}

	if ($validasi) {
		$q = $connection->query("SELECT kd_jenis_bantuan FROM jenis_bantuan WHERE nama LIKE '%$_POST[nama]%'");
		if ($q->num_rows) {
			echo alert("jenis_bantuan sudah ada!", "?page=jenis_bantuan");
			$err = true;
		}
	}

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=jenis_bantuan");
  } else {
		echo alert("Gagal!", "?page=jenis_bantuan");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM jenis_bantuan WHERE kd_jenis_bantuan='$_GET[key]'");
	echo alert("Berhasil!", "?page=jenis_bantuan");
}
?>
<div class="row">
	<div class="col-md-4">
	    <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
	        <div class="panel-heading"><h3 class="text-center"><?= ($update) ? "EDIT" : "TAMBAH" ?></h3></div>
	        <div class="panel-body">
	            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
	                <div class="form-group">
	                    <label for="nama">Nama</label>
	                    <input type="text" name="nama" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
	                </div>
	                <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
	                <?php if ($update): ?>
										<a href="?page=jenis_bantuan" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>
	            </form>
	        </div>
	    </div>
	</div>
	<div class="col-md-8">
	    <div class="panel panel-info">
	        <div class="panel-heading"><h3 class="text-center">DAFTAR JENIS BANTUAN</h3></div>
	        <div class="panel-body">
	            <table class="table table-condensed">
	                <thead>
	                    <tr>
	                        <th>No</th>
	                        <th>Nama</th>
	                        <th>Aksi</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT * FROM jenis_bantuan")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
	                        <tr>
	                            <td><?=$no++?></td>
	                            <td><?=$row['nama']?></td>
	                            <td>
	                                <div class="btn-group">
	                                    <a href="?page=jenis_bantuan&action=update&key=<?=$row['kd_jenis_bantuan']?>" class="btn btn-info btn-xs">Edit</a>
	                                    <a href="?page=jenis_bantuan&action=delete&key=<?=$row['kd_jenis_bantuan']?>" class="btn btn-danger btn-xs">Hapus</a>
	                                </div>
	                            </td>
	                        </tr>
	                        <?php endwhile ?>
	                    <?php endif ?>
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
