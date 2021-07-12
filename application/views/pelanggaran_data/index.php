<div class="card mb-3">
	<div class="card-header">

		<?php
		if ($cari == "menunggu tindak lanjut") {
			?>
			<a href="<?php echo base_url()."pelanggaran_data" ;?>" style="float: right; display: inline;"><button class="btn btn-secondary" type="button">Tampilkan Semua Data</button></a>
			<?php
		}
		?>

		<a href="<?php echo base_url()."pelanggaran_data/form" ;?>" style="float: right; display: inline;"><button class="btn btn-primary mr-1" type="button">Tambah Data Pelanggaran</button></a>
		<h2>
			<?php echo $halaman ;?>
		</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="row">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr align="center">
						<th>Aksi</th>
						<th>Pelaku</th>
						<th>Pelanggaran</th>
						<th>Tanggal Pelanggaran</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($pelanggaran_data as $pelanggaran_data) {
						?>
						<tr>
							<td align="center">
								<a href="<?php echo base_url()."pelanggaran_data/detail/".$pelanggaran_data->kd_data_pelanggaran ; ?>"><button class="btn btn-primary"><i class="fa fa-search"></i></button></a>
								<hr>
								<span class="badge badge-secondary"><?php echo $pelanggaran_data->status_pelanggaran; ?></span>
							</td>
							<td align="center">
								<?php echo $pelanggaran_data->nama_siswa; ?>
							</td>
							<td>
								<?php echo $pelanggaran_data->pelanggaran; ?>
							</td>
							<td align="right">
								<?php echo date_format(DateTime::createFromFormat("Y-m-d" ,$pelanggaran_data->tanggal_pelanggaran), "d F Y"); ?>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>