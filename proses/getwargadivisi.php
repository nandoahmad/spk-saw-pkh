<?php 
require_once '../config.php';
$sqlwarga = mysqli_query($konek, "SELECT kd_jenis_bantuan FROM warga WHERE nomor = '$_GET[nomor]'");
$kd_jenis_bantuan = mysqli_fetch_assoc($sqlwarga)['kd_jenis_bantuan'];

$sql = mysqli_query($konek, "SELECT * FROM jenis_bantuan WHERE kd_jenis_bantuan = '$kd_jenis_bantuan'");
$jenis_bantuan = mysqli_fetch_assoc($sql);
echo json_encode($jenis_bantuan);

?>