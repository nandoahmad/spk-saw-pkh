<?php 
// session_start();
require_once "config.php";
$sql = mysqli_query($konek, "SELECT COUNT(nama) AS countBiodata, nomor FROM warga WHERE username = '$_SESSION[username]'");
$getNamawarga = $connection->query("SELECT * FROM warga WHERE username='$_SESSION[username]'");
$datanama = $getNamawarga->fetch_assoc();
$cekBiodata = mysqli_fetch_assoc($sql);
// print_r($cekBiodata);
if ($cekBiodata['countBiodata'] == 0) {
	echo "
	<script>
		alert('Mohon isi biodata terlebih dahulu.');
		window.location.href='index_warga.php?page=isi_biodata';
	</script>";
}
?>
<html>
<head>
	<title>Upload Berkas Calon warga Baru Grand City Mall</title>
</head>
<body>

	<h1>Upload Berkas Anda Disini</h1>
	<h3>Dengan Format Nama_Nama File_Nama jenis_bantuan Yang Di Daftar</h3>
	<div class="form-group">
				<label>File 1:</label>
				<form action="./proses/proses_upload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file1">
				<input type="hidden" name="kd_pengguna1" value="<?php echo $cekBiodata['nomor']?>">
				<input type="hidden" name="namalengkap" value="<?=$datanama['nama']?>">
			</div>	
<!-- 	<form action="./proses/proses_upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="hidden" name="kd_pengguna" value="<?php echo $_GET['kd_pengguna']?>"> -->
		<input type="submit" name="upload" value="Upload" class="btn btn-primary">
	</form> 
</body>
</html>

