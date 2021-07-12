<?php
if ($jumlah_data_pelanggaran > 0) {
	?>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body"><b><?php echo $jumlah_data_pelanggaran ; ?></b> Pelanggaran yang Belum Di Tindak Lanjut</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="<?php echo base_url(); ?>pelanggaran_data/index/menunggu tindak lanjut">Lihat</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>

<div class="card mb-3">
	<div class="card-header">
		<h2><?php echo $halaman ; ?></h2>
	</div>
	<div class="card-body" style="min-height: 20vw;">
		<div class="row">
			<div class="col-xl-6 col-sm-6 mb-3">

			</div>


			<div class="col-xl-6 col-sm-6 mb-3">

			</div>
		</div>
	</div>
</div>