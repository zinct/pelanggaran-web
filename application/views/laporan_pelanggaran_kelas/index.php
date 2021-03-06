<section class="section">
	<div class="section-header">
		<h1>Laporan Pelanggaran Siswa</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item active">Laporan Pelanggaran Siswa</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header iseng-sticky bg-white">
			<h4>Laporan Pelanggaran Siswa</h4>
			<div class="card-header-action">
				<a href="<?= base_url('laporan_pelanggaran_kelas/laporan') ?>" target="_blank" class="btn btn-danger">Cetak</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped dataTable" id="table-1">
					<thead>
						<tr>
							<th class="text-center">
								#
							</th>
							<th>Kelas</th>
							<th>Pelanggaran</th>
							<th>Poin Tercatat</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($pelanggaran_data as $row) : ?>
							<tr>
								<td class="text-center"><?= $i++ ?></td>
								<td nowrap>
									<?= $row->nama_kelas ?><br>
									<span style="font-size: smaller;color: gray;">NIS: <?= $row->nama_jurusan ?><br>
								</td>
								<td>
									<?= $row->jumlah_pelanggaran ?>
								</td>
								<td>
									<?= $row->jumlah_poin ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>