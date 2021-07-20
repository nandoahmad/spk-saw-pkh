<html>
	<head>
		<title>Upload Berkas</title>
	</head>
	<body>
	<h1>Upload Berkas Anda Disini</h1>
		<?php 
		require_once('../config.php');
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('pdf','docx');
			$namalengkap = $_POST['namalengkap'];
			$nama1 = $_FILES['file1']['name'];
			$x1 = explode('.', $nama1);
			$ekstensi1 = strtolower(end($x1));
			$newfilename1 = $namalengkap . "_" . '1' . $nama1;
			$ukuran1	= $_FILES['file1']['size'];
			$file_tmp1 = $_FILES['file1']['tmp_name'];
 
			if(in_array($ekstensi1, $ekstensi_diperbolehkan) === true){
				if($ukuran1 < 10000000000000000000000){			
					move_uploaded_file($file_tmp1, '../file/'.$newfilename1);
					$query = mysqli_query($connection, "INSERT INTO berkas (kd_pengguna, nama_berkas) VALUES ('".($_POST['kd_pengguna1'])."','".$newfilename1."')");
					if($query){
						  echo "<script>
         alert('Data Berhasil Di Upload');
         window.location.href='../index_warga.php?page=home';
         </script>";
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

		?>

		<br/>
		<br/>
		<a href="?page=upload_berkas&kd_pengguna=<?php echo ($_POST['kd_pengguna']) ?>">Upload Lagi</a>
		<br/>
		<br/>
 
		
	</body>
</html>