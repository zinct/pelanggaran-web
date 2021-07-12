<?php
if(date("m") > 6){
	$ttahun = 1;
}
else{
	$ttahun = 0;
}
$tahun = date("Y") - $siswa->kd_tahun + $ttahun + 9;

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
		<a href="<?php echo base_url()."siswa" ;?>" style="float: right; display: inline;"><button class="btn btn-secondary" type="button">Kembali</button></a>
		<h2>Detail Siswa</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="row">

			<div class="col-sm-3 mb-3">
				<label for="Pelaku" class="form-label">NIS</label>
				<h4><?php echo $siswa->nis ; ?></h4>
			</div>
			<div class="col-sm-6 mb-3">
				<label for="Pelaku" class="form-label">Nama</label>
				<h4><?php echo $siswa->nama_siswa; ?></h4>
			</div>
			<div class="col-sm-3 mb-3">
				<label for="Pelaku" class="form-label">Total Poin</label>
				<h4>
					<?php
					$poin = $this->Pelanggaran_data_model->get_Data_Pelanggaran_Poin($siswa->nis)->row();
					if ($poin->poin) {
						?>
						<div class="alert alert-secondary" role="alert">
							<?php
							echo $poin->poin;
							?>
						</div>
						<?php
					}
					else{
						?>
						<div class="alert alert-secondary" role="alert">
							<?php
							echo 0;
							?>
						</div>
						<?php
					}
					?>
				</h4>
			</div>

			<div class="col-sm-4 mb-3">
				<label for="Kelas" class="form-label">Kelas</label>
				<h5><?php echo numberToRoman($tahun) . " " . $siswa->nama_kelas; ?></h5>
			</div>
			<div class="col-sm-4 mb-3">
				<label for="Pelaku" class="form-label">Jenis Kelamin</label>
				<h4><?php echo $siswa->jk_siswa; ?></h4>
			</div>
			<div class="col-sm-4 mb-3">
				<label for="Jenis Pelanggaran" class="form-label">Agama</label>
				<h4><?php echo $siswa->agama ; ?></h4>
			</div>


			<div class="col-sm-8 mb-3">
				<label for="Pelanggaran" class="form-label">Tempat Tanggal Lahir</label>
				<h5><?php echo $siswa->tempat_lahir . ", " . date_format(DateTime::createFromFormat("Y-m-d" ,$siswa->tanggal_lahir), "d F Y") ; ?></h5>
			</div>
			<div class="col-sm-4 mb-3">
				<label for="Pelanggaran" class="form-label">No Telepon</label>
				<h5><?php echo $siswa->telepon ; ?></h5>
			</div>

			<div class="col-sm-12 mb-3">
				<label for="Pelanggaran" class="form-label">Alamat</label>
				<h5><?php echo $siswa->alamat . ",<br>RT " . $siswa->rt . "/RW " . $siswa->rw . ", Desa " . $siswa->desa . ", Kecamatan " . $siswa->kecamatan . ", " . $siswa->kota ; ?></h5>
			</div>

			<div class="col-sm-8 mb-3">
				<label for="Pelanggaran" class="form-label">Kebutuhan Khusus</label>
				<h5><?php echo $siswa->kebutuhan_khusus ; ?></h5>
			</div>
			<div class="col-sm-4 mb-3">
				<label for="Pelanggaran" class="form-label">Tahun Masuk</label>
				<h5><?php echo $siswa->tahun_masuk ; ?></h5>
			</div>

			<div class="col-sm-12 mb-3">
				<label for="Pelanggaran" class="form-label">Keterangan</label>
				<h5><?php echo $siswa->keterangan ; ?></h5>
			</div>
		</div>
	</div>
</div>