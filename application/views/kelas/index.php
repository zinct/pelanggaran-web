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
		<h2>
			<?php echo $halaman ;?>
		</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="accordion" id="accordionExample">
			<?php
			foreach ($tahun as $tahun) {
				?>

				<div class="card">
					<div class="card-header" id="<?php echo $tahun->kd_tahun ; ?>">
						<h2 class="mb-0">
							<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $tahun->kd_tahun ; ?>" aria-expanded="false" aria-controls="collapse<?php echo $tahun->kd_tahun ; ?>">
								<?php echo "Tahun Ajaran " . $tahun->kd_tahun ; ?>
							</button>
						</h2>
					</div>

					<div id="collapse<?php echo $tahun->kd_tahun ; ?>" class="collapse" aria-labelledby="<?php echo $tahun->kd_tahun ; ?>" data-parent="#accordionExample">
						<div class="card-body">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<tr>
									<th width="10%" style="text-align: center;">Aksi</th>
									<th>Kelas</th>
									<th width="40%" style="text-align: center;">Jurusan</th>
								</tr>
								<?php
								$kelas = $this->Kelas_model->get_Kelas($tahun->kd_tahun)->result();
								foreach ($kelas as $kelas) {

									if(date("m") > 6){
										$ttahun = 1;
									}
									else{
										$ttahun = 0;
									}
									$tahun = date("Y") - $kelas->kd_tahun + $ttahun + 9;

									
									?>
									<tr>
										<td align="center">
											<a href="<?php echo base_url()."siswa/index/".$kelas->kd_kelas ; ?>"><button class="btn btn-primary"><i class="fa fa-search"></i></button></a>
										</td>
										<td><?php echo numberToRoman($tahun) . " " .$kelas->nama_kelas ; ?></td>
										<td><?php echo $kelas->nama_jurusan ; ?></td>
									</tr>
									<?php
								}
								?>
							</table>
						</div>
					</div>
				</div>

				<?php
			}
			?>

			<div class="card">
				
			</div>
		</div>
	</div>
</div>