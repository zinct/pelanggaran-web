<div class="card mb-3">
	<div class="card-header">
		<a href="<?php echo base_url()."jurusan" ;?>" style="float: right; display: inline;"><button class="btn btn-secondary" type="button">Kembali</button></a>
		<h2>Detail jurusan</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="row">

			<div class="col-sm-12 mb-3">
				<label for="Pelaku" class="form-label">Kode Jurusan</label>
				<h4><?php echo $jurusan->kd_jurusan ; ?></h4>
			</div>

			<div class="col-sm-12 mb-3">
				<label for="Pelaku" class="form-label">Nama Jurusan</label>
				<h4><?php echo $jurusan->nama_jurusan; ?></h4>
			</div>

			<div class="col-sm-12 mb-3">
				<label for="Pelaku" class="form-label">Keterangan</label>
				<h4><?php echo $jurusan->keterangan; ?></h4>
			</div>
		</div>
	</div>
</div>