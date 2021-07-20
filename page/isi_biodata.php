<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM warga WHERE username='$_GET[username]'");
	$row = $sql->fetch_assoc();
}


$sql = $connection->query("SELECT * FROM warga WHERE username='".$_SESSION['username']."'");
$row = $sql->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$validasi = false; $err = false;
	// if ($update) {
		$sql = "UPDATE warga SET nomor='$_POST[nomor]',nik='$_POST[nik]', nama='$_POST[nama]', alamat='$_POST[alamat]', tanggal_lahir='$_POST[tanggal_lahir]', jenis_kelamin='$_POST[jenis_kelamin]', kondisi_ibu='$_POST[kondisi_ibu]', anak_balita='$_POST[anak_balita]',  anak_sd='$_POST[anak_sd]', anak_smp='$_POST[anak_smp]', anak_sma='$_POST[anak_sma]', lanjut_usia='$_POST[lanjut_usia]', disabilitas='$_POST[disabilitas]', kd_jenis_bantuan='$_POST[kd_jenis_bantuan]',  tahun_mengajukan='".date("Y")."' WHERE username='$_SESSION[username]'";
	// } else {
	// 	$sql = "INSERT INTO warga VALUES ('$_POST[nomor]', '$_POST[nama]', '$_POST[alamat]', '$_POST[tanggal_lahir]', '$_POST[jenis_kelamin]','$_POST[kondisi_ibu]', '".date("Y")."')";
	// 	$validasi = true;
	// }

	if ($validasi) {
		$q = $connection->query("SELECT nomor FROM warga WHERE nomor=$_POST[nomor]");
		if ($q->num_rows) {
			echo alert($_POST["nomor"]." sudah terdaftar!", "?page=isi_biodata");
			$err = true;
		}
	}

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=isi_biodata");
  } else {
		echo alert("Gagal!", "?page=isi_biodata");
  }
}
?>

    <div class="container">
	<div class="col-md-12">
        <div class="row">
	    <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
	        <div class="panel-heading"><h3 class="text-center"><?= ($update) ? "EDIT" : "BIODATA" ?></h3></div>
	        <div class="panel-body">
	            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
	                <div class="form-group">
	                    <label for="nomor">Nomor</label>
	                    <input type="text" name="nomor" readonly class="form-control" value="<?= $row != null ? $row['nomor'] : '' ?>">
	                </div>
	                <div class="form-group">
	                    <label for="nomor">No.Induk</label>
	                    <input type="text" name="nik" class="form-control" value="<?= $row != null ? $row['nik'] : '' ?>">
	                </div>
	                <div class="form-group">
	                    <label for="nama">Nama Lengkap</label>
	                    <input type="text" name="nama" class="form-control" value="<?= $row != null ? $row['nama'] : '' ?>">
	                </div>
	                <div class="form-group">
	                    <label for="alamat">Alamat</label>
	                    <input type="text" name="alamat" class="form-control" value="<?= $row != null ? $row['alamat'] : '' ?>">
	                </div>
	                	<div class="form-group">
	                    <label for="alamat">Tanggal Lahir</label>
	                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= $row != null ? $row['tanggal_lahir'] : '' ?>">
	                </div>
					<div class="form-group" >
	                  <label for="jenis_kelamin" style="margin-top:10px">Jenis Kelamin</label>
										<select class="form-control" name="jenis_kelamin">
											<option>---</option>
											<option value="Laki-laki" <?= $row != null && $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?> >Laki-laki</option>
											<option value="Perempuan" <?= $row != null && $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?> >Perempuan</option>
										</select>
					</div>
	                <div class="form-group">
	                	<div class="col-lg-6" style="padding-left:0px">
	                    <label for="alamat">Kondisi Ibu</label>
		                    <select class="form-control" name="kondisi_ibu">
							<option></option>
							<option value="hamil" <?= $row != null && $row['kondisi_ibu'] == 'hamil' ? 'selected' : '' ?> >Hamil</option>
							<option value="menyusui" <?= $row != null && $row['kondisi_ibu'] == 'menyusui' ? 'selected' : '' ?> >Menyusui</option>
							<option value="tidak hamil" <?= $row != null && $row['kondisi_ibu'] == 'tidak hamil' ? 'selected' : '' ?> >Tidak Hamil</option>
							</select>
	                </div>
					<div class="form-group">
	                	<div class="col-lg-6" style="padding-left:0px">
	                    <label for="alamat">Anak Balita</label>
		                    <select class="form-control" name="anak_balita">
							<option></option>
							<option value="tidak ada" <?= $row != null && $row['anak_balita'] == 'tidak ada' ? 'selected' : '' ?> >Tidak Ada</option>
							<option value="ada" <?= $row != null && $row['anak_balita'] == 'ada' ? 'selected' : '' ?> >Ada</option>
							</select>
	                </div>
					<div class="form-group">
	                	<div class="col-lg-6" style="padding-left:0px">
	                    <label for="alamat"style="margin-top:15px">Anak SD</label>
		                    <select class="form-control" name="anak_sd">
							<option></option>
							<option value="ada" <?= $row != null && $row['anak_sd'] == 'ada' ? 'selected' : '' ?> >Ada</option>
							<option value="tidak ada" <?= $row != null && $row['anak_sd'] == 'tidak ada' ? 'selected' : '' ?> >Tidak Ada</option>
							</select>
	                </div>
					<div class="form-group">
	                	<div class="col-lg-6" style="padding-left:0px">
	                    <label for="alamat"style="margin-top:15px">Anak SMP</label>
		                    <select class="form-control" name="anak_smp">
							<option></option>
							<option value="tidak ada" <?= $row != null && $row['anak_smp'] == 'tidak ada' ? 'selected' : '' ?> >Tidak Ada</option>
							<option value="ada" <?= $row != null && $row['anak_smp'] == 'ada' ? 'selected' : '' ?> >Ada</option>
							</select>
	                </div>
					<div class="form-group">
	                	<div class="col-lg-6" style="padding-left:0px">
	                    <label for="alamat"style="margin-top:15px">Anak SMA</label>
		                    <select class="form-control" name="anak_sma">
							<option></option>
							<option value="tidak ada" <?= $row != null && $row['anak_sma'] == 'tidak ada' ? 'selected' : '' ?> >Tidak Ada</option>
							<option value="ada" <?= $row != null && $row['anak_sma'] == 'ada' ? 'selected' : '' ?> >Ada</option>
							</select>
	                	</div>
					<div class="form-group">
	                	<div class="col-lg-6" style="padding-left 0px">
	                		<label for="alamat"style="margin-top:15px">Lanjut Usia</label>
							<select class="form-control" name="lanjut_usia">
							<option></option>
							<option value="<60" <?= $row != null && $row['lanjut_usia'] == '<60' ? 'selected' : '' ?> > < 60 </option>
							<option value=">60" <?= $row != null && $row['lanjut_usia'] == '>60' ? 'selected' : '' ?> > > 60 </option>
							</select>
	                	</div>
	                </div>
	                  <label for="pengalaman_kerja"style="margin-top:15px">Disabilitas</label>
										<select class="form-control" name="disabilitas">
											<option>---</option>
											<option value="tidak disabilitas" <?= $row != null && $row['disabilitas'] == 'tidak disabilitas' ? 'selected' : '' ?> >Tidak Disabilitas</option>
											<option value="mental" <?= $row != null && $row['disabilitas'] == 'mental' ? 'selected' : '' ?> >Mental</option>
											<option value="intelektual" <?= $row != null && $row['disabilitas'] == 'intelektual' ? 'selected' : '' ?> >Intelektual</option>
											<option value="fisik" <?= $row != null && $row['disabilitas'] == 'fisik' ? 'selected' : '' ?> >Fisik</option>
										</select>
					</div>
					<div class="form-group">
					<label for="kd_jenis_bantuan">Jenis Bantuan</label>
										<select class="form-control" name="kd_jenis_bantuan" id="jenis_bantuan">
											<option>---</option>
											<?php $sql = $connection->query("SELECT * FROM  jenis_bantuan") ?>
											<?php while ($data = $sql->fetch_assoc()): ?>
											<option value="<?=$data["kd_jenis_bantuan"]?>" <?= $row != null && $row["kd_jenis_bantuan"] == $data["kd_jenis_bantuan"]? 'selected':'' ?> ><?=$data["nama"]?></option>
											<?php endwhile; ?>
										</select>
					</div>

	                <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
<!-- 	                <?php if ($update): ?>
										<a href="?page=warga" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?> -->
	            </form>
	        </div>
	    </div>
	</div>