<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM warga WHERE nomor='$_GET[key]'");
	$row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$validasi = false; $err = false;
	if ($update) {
		$sql = "UPDATE warga SET nomor='$_POST[nomor]', nama='$_POST[nama]', alamat='$_POST[alamat]', umur='$_POST[umur]', jenis_kelamin='$_POST[jenis_kelamin]', kondisi_ibu='$_POST[kondisi_ibu]', anak_balita='$_POST[anak_balita]',  anak_sd='$_POST[anak_sd]', anak_smp='$_POST[anak_smp]', anak_sma='$_POST[anak_sma]', lanjut_usia='$_POST[lanjut_usia]', disabilitas='$_POST[disabilitas]', kd_jenis_bantuan='$_POST[kd_jenis_bantuan]', tahun_mengajukan='".date("Y")."' WHERE nomor='$_GET[key]'";
	} else {
		$sql = "INSERT INTO warga VALUES ('$_POST[nomor]', '$_POST[nama]', '$_POST[alamat]', '$_POST[umur]', '$_POST[jenis_kelamin]','$_POST[kondisi_ibu]', '".date("Y")."')";
		$validasi = true;
	}


	if ($validasi) {
		$q = $connection->query("SELECT nomor FROM warga WHERE nomor=$_POST[nomor]");
		if ($q->num_rows) {
			echo alert($_POST["nomor"]." sudah terdaftar!", "?page=warga");
			$err = true;
		}
	}

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=warga");
  } else {
		echo alert("Gagal!", "?page=warga");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM warga WHERE nomor=$_GET[key]");
	echo alert("Berhasil!", "?page=warga");
}
?>
<!-- <div class="row">
	<div class="col-md-4">
	    <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
	        <div class="panel-heading"><h3 class="text-center"><?= ($update) ? "EDIT" : "TAMBAH" ?></h3></div>
	        <div class="panel-body">
	            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
	                <div class="form-group">
	                    <label for="nomor">No.Induk</label>
	                    <input type="text" name="nomor" class="form-control" <?= (!$update) ?: 'value="'.$row["nomor"].'"' ?>>
	                </div>
	                <div class="form-group">
	                    <label for="nama">Nama Lengkap</label>
	                    <input type="text" name="nama" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
	                </div>
	                <div class="form-group">
	                    <label for="alamat">Alamat</label>
	                    <input type="text" name="alamat" class="form-control" <?= (!$update) ?: 'value="'.$row["alamat"].'"' ?>>
	                </div>
									<div class="form-group">
	                  <label for="jenis_kelamin">Jenis Kelamin</label>
										<select class="form-control" name="jenis_kelamin">
											<option>---</option>
											<option value="Laki-laki" <?= (!$update) ?: (($row["jenis_kelamin"] != "Laki-laki") ?: 'selected="on"') ?>>Laki-laki</option>
											<option value="Perempuan" <?= (!$update) ?: (($row["jenis_kelamin"] != "Perempuan") ?: 'selected="on"') ?>>Perempuan</option>
										</select>
									</div>
	                <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
	                <?php if ($update): ?>
										<a href="?page=warga" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>
	            </form>
	        </div>
	    </div>
	</div> -->
    <div class="container">
        <div class="row">
	    <div class="panel panel-info">
	        <div class="panel-heading"><h3 class="text-center">DAFTAR CALON PENERIMA</h3></div>
	        <div class="panel-body">
	            <table class="table table-condensed">
	                <thead>
	                    <tr>
	                        <th>No</th>
	                        <th>No.Induk</th>
	                        <th>Nama</th>
	                        <th>Alamat</th>
	                        <th>Usia</th>
	                        <th>Jenis Kelamin</th>
	                        <th>Kondisi Ibu</th>
							<th>Anak Balita</th>
							<th>Anak SD</th>
							<th>Anak SMP</th>
							<th>Anak SMA</th>
	                        <th>Lanjut Usia</th>
	                        <th>Disabilitas</th>
	                        <th>Jenis Bantuan</th>
	                        <th>Tahun</th>
	                        <th>Aksi</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT k.*, d.nama AS nama_jenis_bantuan FROM warga k LEFT JOIN jenis_bantuan d ON k.kd_jenis_bantuan = d.kd_jenis_bantuan")): ?>
	                        <?php while($row = $query->fetch_assoc()):
	                        	$dateOfBirth = $row['tanggal_lahir'];
	                        	$dob = new DateTime($dateOfBirth);
	                        	$now = new DateTime();
	                        	$diff = $now->diff($dob);
	                        ?>
	                        <tr>
	                            <td><?=$no++?></td>
	                            <td><?=$row['nik']?></td>
	                            <td><?=$row['nama']?></td>
	                            <td><?=$row['alamat']?></td>
	                            <td><?=$diff->y?> Tahun</td>
	                            <td><?=$row['jenis_kelamin']?></td>
	                            <td><?=$row['kondisi_ibu']?></td>
	                            <td><?=$row['anak_balita']?></td>
								<td><?=$row['anak_sd']?></td>
								<td><?=$row['anak_smp']?></td>
								<td><?=$row['anak_sma']?></td>
	                            <td><?=$row['lanjut_usia']?></td>
	                            <td><?=$row['disabilitas']?></td>
	                            <td><?=$row['nama_jenis_bantuan']?></td>
	                            <td><?=$row['tahun_mengajukan']?></td>
	                            <td>
	                                <div class="btn-group">
	                                    <a href="?page=warga&action=delete&key=<?=$row['nomor']?>" class="btn btn-danger btn-xs">Hapus</a>
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
