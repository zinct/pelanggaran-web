<?php
function numberToRoman($num){ 

	$n = intval($num);
	$result = '';
	$lookup = array(
		'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 
		'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 
		'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
	); 

	foreach ($lookup as $roman => $value)  
	{
		$matches = intval($n / $value); 
		$result .= str_repeat($roman, $matches); 
		$n = $n % $value; 
	} 

	return $result;
}
?>
<div class="card mb-3">
	<div class="card-header">
		<a href="<?php echo base_url()."pelanggaran_data" ;?>" style="float: right; display: inline;"><button class="btn btn-secondary" type="button">Kembali</button></a>
		<h2>Data Pelanggaran Baru</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="row">
			<form action="<?php echo base_url().'pelanggaran_data/tambah' ; ?>" method="POST" class="col-sm-12 mb-3">
				<div class="col-sm-12 mb-3">
					<label for="pelaku" class="form-label">Pelaku</label>
					<input name="pelaku" class="form-control" list="datalistPelaku" id="pelaku" required="">
					<datalist id="datalistPelaku">

						<?php
						foreach ($siswa as $siswa) {

							if(date("m") > 6){
								$ttahun = 1;
							}
							else{
								$ttahun = 0;
							}
							$tahun = date("Y") - $siswa->kd_tahun + $ttahun + 9;

							?>
							<option value="<?php echo $siswa->nis ; ?>"><?php echo numberToRoman($tahun) . " " . $siswa->nama_kelas . " - " . $siswa->nama_siswa ; ?></option>
							<?php
						}
						?>

					</datalist>
				</div>

				<div class="col-sm-12 mb-3">
					<label for="pelanggaran" class="form-label">Pelanggaran</label>

					<input name="pelanggaran" class="form-control" list="datalistpelanggaran" id="pelanggaran" required="">
					<datalist id="datalistpelanggaran">

						<?php
						foreach ($pelanggaran as $pelanggaran) {
							?>
							<option value="<?php echo $pelanggaran->kd_pelanggaran ; ?>"><?php echo $pelanggaran->jenis_pelanggaran . " - " . $pelanggaran->pelanggaran ; ?></option>
							<?php
						}
						?>

					</datalist>

				</div>

				<div class="col-sm-12 mb-3">
					<label for="tanggal_pelanggaran" class="form-label">Waktu Pelanggaran</label>
					<input type="date" name="tanggal_pelanggaran" class="form-control" value="<?php echo date('Y-m-d') ; ?>">
				</div>

				<div class="col-sm-12 mb-3">
					<label for="tanggal_pelanggaran" class="form-label">Keterangan</label>
					<textarea name="keterangan" class="form-control"></textarea>
				</div>

				<div class="col-sm-12 mb-3">
					<input type="submit" value="Proses" class="form-control btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>