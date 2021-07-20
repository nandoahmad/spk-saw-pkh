<div class="row">
	<div class="col-md-12">
	<?php if (isset($_GET["jenis_bantuan"])) {
		$sqlKriteria = "";
		$namaKriteria = [];
		$queryKriteria = $connection->query("SELECT a.kd_kriteria, a.nama FROM kriteria a JOIN model b USING(kd_kriteria) WHERE b.kd_jenis_bantuan=$_GET[jenis_bantuan]");
		while ($kr = $queryKriteria->fetch_assoc()) {
			$sqlKriteria .= "SUM(
				IF(
					c.kd_kriteria=".$kr["kd_kriteria"].",
					IF(c.sifat='max', nilai.nilai/c.normalization, c.normalization/nilai.nilai), 0
				)
			) AS ".strtolower(str_replace(" ", "_", $kr["nama"])).",";
			$namaKriteria[] = strtolower(str_replace(" ", "_", $kr["nama"]));
		}
		$sql = "SELECT
			(SELECT nama FROM warga WHERE nomor=krw.nomor) AS nama,
			(SELECT nomor FROM warga WHERE nomor=krw.nomor) AS nomor,
			(SELECT tahun_mengajukan FROM warga WHERE nomor=krw.nomor) AS tahun,
			$sqlKriteria
			SUM(
				IF(
						c.sifat = 'max',
						nilai.nilai / c.normalization,
						c.normalization / nilai.nilai
				) * c.bobot
			) AS rangking
		FROM
			nilai
			JOIN warga krw USING(nomor)
			JOIN (
				SELECT
						nilai.kd_kriteria AS kd_kriteria,
						kriteria.sifat AS sifat,
						(
							SELECT bobot FROM model WHERE kd_kriteria=kriteria.kd_kriteria AND kd_jenis_bantuan=jenis_bantuan.kd_jenis_bantuan
						) AS bobot,
						
							IF(kriteria.sifat='max', MAX(nilai.nilai), MIN(nilai.nilai)) 
						 AS normalization
					FROM nilai
					JOIN kriteria USING(kd_kriteria)
					JOIN jenis_bantuan ON kriteria.kd_jenis_bantuan=jenis_bantuan.kd_jenis_bantuan
					WHERE jenis_bantuan.kd_jenis_bantuan=$_GET[jenis_bantuan]
				GROUP BY nilai.kd_kriteria
			) c USING(kd_kriteria)
		WHERE nilai.kd_jenis_bantuan=$_GET[jenis_bantuan]
		GROUP BY nilai.nomor
		ORDER BY rangking DESC"; ?>
	  <div class="panel panel-info">
	      <div class="panel-heading"><h3 class="text-center"><h2 class="text-center"><?php $query = $connection->query("SELECT * FROM jenis_bantuan WHERE kd_jenis_bantuan=$_GET[jenis_bantuan]"); echo $query->fetch_assoc()["nama"]; ?></h2></h3></div>
	      <div class="panel-body">
	          <table class="table table-condensed table-hover">
	              <thead>
	                  <tr>
							<th>Nomor</th>
							<th>Nama</th>
							<th>Nilai</th>
							<th>Ranking</th>
	                  </tr>
	              </thead>
	              <tbody>
					<?php $query = $connection->query($sql);
					$number=0;
					 while($row = $query->fetch_assoc()):
					 	$number++;
					  ?>
					<?php
					$rangking = number_format((float) $row["rangking"], 8, '.', '');
					$q = $connection->query("SELECT nomor FROM hasil WHERE nomor='$row[nomor]' AND kd_jenis_bantuan='$_GET[jenis_bantuan]' AND tahun='$row[tahun]'");
					if (!$q->num_rows) {
					$connection->query("INSERT INTO hasil VALUES(NULL, '$_GET[jenis_bantuan]', '$row[nomor]', '".$rangking."', '$row[tahun]')");
					}
					if($number <= 20){
					?>
					<tr>
						<td><?=$row["nomor"]?></td>
						<td><?=$row["nama"]?></td>
						<?php for($i=0; $i<count($namaKriteria); $i++): ?>
						<!-- <th><?//=number_format((float) $row[$namaKriteria[$i]], 8, '.', '');?></th> -->
						<?php endfor ?>
						<td><?=$rangking?></td>
						<td><?=$number?></td>
					</tr>
					<?php } endwhile;?>
	              </tbody>
	          </table>
	      </div>
	  </div>
	<?php } else { ?>
		<h1>jenis_bantuan belum dipilih...</h1>
	<?php } ?>
	</div>
</div>
