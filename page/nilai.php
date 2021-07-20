<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM nilai JOIN penilaian USING(kd_kriteria) WHERE kd_nilai='$_GET[key]'");
	$row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["save"])) {
	$validasi = false; $err = false;
	if ($update) {
		$sql = "UPDATE nilai SET kd_kriteria='$_POST[kd_kriteria]', nomor='$_POST[nnomor]', nilai='$_POST[nilai]' WHERE kd_nilai='$_GET[key]'";
	} else {
		$query = "INSERT INTO nilai VALUES ";
		foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
			$query .= "(NULL, '$_POST[kd_jenis_bantuan]', '$kd_kriteria', '$_POST[nomor]', '$nilai'),";
		}
		$sql = rtrim($query, ',');
		$validasi = true;
	}

	if ($validasi) {
		foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
			$q = $connection->query("SELECT kd_nilai FROM nilai WHERE kd_jenis_bantuan=$_POST[kd_jenis_bantuan] AND kd_kriteria=$kd_kriteria AND nomor=$_POST[nomor] AND nilai LIKE '%$nilai%'");
			if ($q->num_rows) {
				echo alert("Nilai untuk ".$_POST["nomor"]." sudah ada!", "?page=nilai");
				$err = true;
			}
		}
	}

  if (!$err AND $connection->query($sql)) {
		echo alert("Berhasil!", "?page=nilai");
	} else {
		echo alert("Gagal!", "?page=nilai");
	}
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM nilai WHERE kd_nilai='$_GET[key]'");
	echo alert("Berhasil!", "?page=nilai");
}
?>
<div class="row">
	<div class="col-md-4">
	    <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
	        <div class="panel-heading"><h3 class="text-center"><?= ($update) ? "EDIT" : "TAMBAH" ?></h3></div>
	        <div class="panel-body">
	            <form action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
									<div class="form-group">
										<label for="nomor">Calon Penerima</label>
										<?php if ($_POST): ?>
											<input type="text" name="nomor" value="<?=$_POST["nomor"]?>" class="form-control" readonly="on">
										<?php else: ?>
											<select class="form-control" name="nomor">
												<option>---</option>
												<?php $sql = $connection->query("SELECT * FROM warga"); while ($data = $sql->fetch_assoc()): ?>
													<option value="<?=$data["nomor"]?>" <?= (!$update) ? "" : (($row["nomor"] != $data["nomor"]) ? "" : 'selected="selected"') ?>><?=$data["nomor"]?> | <?=$data["nama"]?></option>
												<?php endwhile; ?>
											</select>
										<?php endif; ?>
									</div>
									<div class="form-group">
	                  <label for="kd_jenis_bantuan">Jenis</label>
										<?php if ($_POST): ?>
											<?php $q = $connection->query("SELECT nama FROM jenis_bantuan WHERE kd_jenis_bantuan=$_POST[kd_jenis_bantuan]"); ?>
											<input type="text"value="<?=$q->fetch_assoc()["nama"]?>" class="form-control" readonly="on">
											<input type="hidden" name="kd_jenis_bantuan" value="<?=$_POST["kd_jenis_bantuan"]?>">
										<?php else: ?>
											<select class="form-control" name="kd_jenis_bantuan" id="jenis_bantuan">
												<option>---</option>
												<?php $sql = $connection->query("SELECT * FROM jenis_bantuan"); while ($data = $sql->fetch_assoc()): ?>
													<option value="<?=$data["kd_jenis_bantuan"]?>"<?= (!$update) ? "" : (($row["kd_jenis_bantuan"] != $data["kd_jenis_bantuan"]) ? "" : 'selected="selected"') ?>><?=$data["nama"]?></option>
												<?php endwhile; ?>
											</select>
										<?php endif; ?>
									</div>
									<?php if ($_POST): ?>
										<?php $q = $connection->query("SELECT * FROM kriteria WHERE kd_jenis_bantuan=$_POST[kd_jenis_bantuan]"); while ($r = $q->fetch_assoc()): ?>
				                <div class="form-group">
					                  <label for="nilai"><?=ucfirst($r["nama"])?></label>
														<select class="form-control" name="nilai[<?=$r["kd_kriteria"]?>]" id="nilai">
															<option>---</option>
															<?php $sql = $connection->query("SELECT * FROM penilaian WHERE kd_kriteria=$r[kd_kriteria]"); while ($data = $sql->fetch_assoc()): ?>
																<option value="<?=$data["bobot"]?>" class="<?=$data["kd_kriteria"]?>"<?= (!$update) ? "" : (($row["kd_penilaian"] != $data["kd_penilaian"]) ? "" : ' selected="selected"') ?>><?=$data["keterangan"]?></option>
															<?php endwhile; ?>
														</select>
				                </div>
										<?php endwhile; ?>
										<input type="hidden" name="save" value="true">
									<?php endif; ?>
	                <button type="submit" id="simpan" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block"><?=($_POST) ? "Simpan" : "Tampilkan"?></button>
	                <?php if ($update): ?>
										<a href="?page=nilai" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>
	            </form>
	        </div>
	    </div>
	</div>
	<div class="col-md-8">
	    <div class="panel panel-info">
	        <div class="panel-heading"><h3 class="text-center">DAFTAR SKOR PEMBOBOTAN</h3></div>
	        <div class="panel-body">
	            <table class="table table-condensed">
	                <thead>
	                    <tr>
	                        <th>No</th>
							
							<th>Nama</th>
	                        <th>Jenis Bantuan</th>
	                        <th>Kriteria</th>
	                        <th>Nilai</th>
	                        <th>Aksi</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT a.kd_nilai, c.nama AS nama_jenis_bantuan, b.nama AS nama_kriteria, d.nomor, d.nama AS nama_warga, a.nilai FROM nilai a JOIN kriteria b ON a.kd_kriteria=b.kd_kriteria JOIN jenis_bantuan c ON a.kd_jenis_bantuan=c.kd_jenis_bantuan JOIN warga d ON d.nomor=a.nomor")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
	                        <tr>
	                            <td><?=$no++?></td>
															
								<td><?=$row['nama_warga']?></td>
	                            <td><?=$row['nama_jenis_bantuan']?></td>
	                            <td><?=$row['nama_kriteria']?></td>
	                            <td><?=$row['nilai']?></td>
	                            <td>
	                                <div class="btn-group">
	                                    <a href="?page=nilai&action=update&key=<?=$row['kd_nilai']?>" class="btn btn-info btn-xs">Edit</a>
	                                    <a href="?page=nilai&action=delete&key=<?=$row['kd_nilai']?>" class="btn btn-danger btn-xs">Hapus</a>
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
<script type="text/javascript">
$("#kriteria").chained("#jenis_bantuan");
$("#nilai").chained("#kriteria");
</script>
