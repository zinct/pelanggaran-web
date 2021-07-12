<?php
if(date("m") > 6){
	$ttahun = 1;
}
else{
	$ttahun = 0;
}
$tahun = date("Y") - $pelanggaran_data->kd_tahun + $ttahun + 9;

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
		<h2>Detail Data Pelanggaran</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="row">

			<div class="col-sm-6 mb-3">
				<label for="Pelaku" class="form-label">Pelaku</label>
				<h4><?php echo $pelanggaran_data->nis . " - " . $pelanggaran_data->nama_siswa; ?></h4>
			</div>
			<div class="col-sm-6 mb-3">
				<label for="Kelas" class="form-label">Kelas</label>
				<h5><?php echo numberToRoman($tahun) . " " . $pelanggaran_data->nama_kelas; ?></h5>
			</div>



			<div class="col-sm-4 mb-3">
				<label for="Jenis Pelanggaran" class="form-label">Jenis Pelanggaran</label>
				<h4><?php echo $pelanggaran_data->kategori_pelanggaran . " - " . $pelanggaran_data->jenis_pelanggaran; ?></h4>
			</div>
			<div class="col-sm-8 mb-3">
				<label for="Pelanggaran" class="form-label">Pelanggaran</label>
				<h5><?php echo $pelanggaran_data->pelanggaran ; ?></h5>
			</div>

			<div class="col-sm-8 mb-3">
				<label for="Pelanggaran" class="form-label">Poin</label>
				<h4><?php echo $pelanggaran_data->poin ; ?></h4>
			</div>
		</div>
	</div>
</div>