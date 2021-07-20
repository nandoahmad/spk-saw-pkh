														<label for="nilai"><?=ucfirst($r["nama"])?></label>
														<select class="form-control" name="nilai[<?=$r["kd_jenis_bantuan"]?>]" id="nilai">
															<option>---</option>
															<?php $sql = $connection->query("SELECT * FROM penilaian WHERE kd_jenis_bantuan=$r[kd_jenis_bantuan]"); while ($data = $sql->fetch_assoc()): ?>
																<option value="<?=$data["bobot"]?>" class="<?=$data["kd_jenis_bantuan"]?>"<?= (!$update) ? "" : (($row["kd_penilaian"] != $data["kd_penilaian"]) ? "" : ' selected="selected"') ?>><?=$data["keterangan"]?></option>
															<?php endwhile; ?>
														</select>


														<?php $sql = $connection->query("SELECT kriteria.nama, penilaian.keterangan FROM kriteria JOIN penilaian ON kriteria.kd_jenis_bantuan = penilaian.kd_jenis_bantuan WHERE nomor");
				             while ($y = $sql->fetch_assoc()): ?>	
										<div class="form-group">
				          	<label for="nomor">Umur</label>
				          	<input type="text"value="<?=$y['keterangan'] ?>" class="form-control" readonly="on">
				          	</div>

				          	<!-- 											<select class="form-control" name="kd_jenis_bantuan" id="jenis_bantuan">
												<option>---</option>
												<?php $sql = $connection->query("SELECT * FROM jenis_bantuan"); while ($data = $sql->fetch_assoc()): ?>
													<option value="<?=$data["kd_jenis_bantuan"]?>"<?= (!$update) ? "" : (($row["kd_jenis_bantuan"] != $data["kd_jenis_bantuan"]) ? "" : 'selected="selected"') ?>><?=$data["nama"]?></option>
												<?php endwhile; ?>
											</select> -->