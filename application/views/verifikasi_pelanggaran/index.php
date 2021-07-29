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
							<input class="form-control form-control-lg text-lg" v-on:keyup.enter.prevent="searchSiswa" id="search" name="nis" type="text" autofocus="on" placeholder="Masukan NIS siswa ex. 181912070084">
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