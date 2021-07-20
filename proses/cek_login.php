<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query ($connection, "SELECT * FROM pengguna WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// echo "$cek";

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	echo $data['status'];
	session_start();
	$_SESSION['is_logged']=true;

	// cek jika user login sebagai admin
	if($data['status']=="petugas"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "petugas";
		// alihkan ke halaman dashboard admin
		header("location:../index.php");

	// cek jika user login sebagai warga
	}else if($data['status']=="warga"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "warga";
		// alihkan ke halaman dashboard warga
		header("location:../index_warga.php");
	}else{

		// alihkan ke halaman login kembali
		// header("location:login.php?pesan=gagal");
		echo "salah";
	}	
}else{
	header("location:../login.php?pesan=gagal");
}

?>