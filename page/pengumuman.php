<?php 
// session_start();
require_once "config.php";
$sql = mysqli_query($konek, "SELECT COUNT(nama) AS countBiodata FROM warga WHERE username = '$_SESSION[username]'");
$cekBiodata = mysqli_fetch_assoc($sql);
// print_r($cekBiodata);
if ($cekBiodata['countBiodata'] == 0) {
	echo "
	<script>
		alert('Mohon Upload File Terlebih Dahulu.');
		window.location.href='index_warga.php?page=upload_berkas';
	</script>";
}
?>

<div class="halaman">
	<h2>Tentang Kami</h2>
	<p>Ini adalah halaman tentang kami</p>
	<p>Malasngoding.com adalah situs yang menyediakan konten-konten berkualitas untuk belajar pemrograman web</p>
</div>