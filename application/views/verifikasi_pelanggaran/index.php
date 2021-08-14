<section class="section">
	<div class="section-header">
		<h1>Verifikasi Pelanggaran</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item active">Verifikasi Pelanggaran</div>
		</div>
	</div>

	<div class="section-body">
		<form action="<?= base_url('verifikasi_pelanggaran/create') ?>" method="GET">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-8 mx-auto">
							<!-- <input class="form-control form-control-lg text-lg" v-on:keyup.enter.prevent="searchSiswa" id="search" name="nis" type="text" autofocus="on" placeholder="Masukan NIS siswa ex. 181912070084"> -->
							<div class="d-flex mx-4">
								<select class="form-control select2" name="nis" id="select-siswa" required>
								</select>
								<button type="submit" class="btn btn-primary px-3"><i class="fas fa-search"></i></button>
							</div>
						</div>
						</div> 
						<div class="row mt-1" style="min-height: 185px;">
							<div class="col-md-6 mx-auto">
								<img src="<?= base_url('assets/img/search.png') ?>" alt="" class="w-75" style="opacity: 0.3;">
							</div>
						</div>
					</div>
			</div>
		</form>
	</div>
</section>

<script>
	$.ajax({
			url: `<?= base_url() ?>siswa/all`,
			success: function(data) {
				$("#select-siswa").empty().append('<option value="">Pilih Siswa</option>');
				data.forEach(i => {
					$("#select-siswa").append("<option value='" + i.nis + "'>" + i.nama_siswa + " (NIS: " + i.nis + ")<br> Kelas: " + i.nama_kelas + "</option>");
				});

				$('#select-siswa').select2({
					templateResult: templateResult,
					templateSelection: templateSelection
				});
			}
		});
</script>