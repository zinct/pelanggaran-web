<section class="section">
	<div class="section-header">
		<h1>Pelanggaran</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item active">Entri Pelanggaran</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header iseng-sticky bg-white">
			<h4>Pelanggaran</h4>
			<div class="card-header-action">

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
							<th>Nama Siswa</th>
							<th>Pelanggaran</th>
							<th nowrap>Poin</th>
							<th>Sanksi</th>
							<th>Pencatat</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($pelanggaran_data as $row) : ?>
							<tr>
								<td class="text-center"><?= $i++ ?></td>
								<td nowrap>
									<?= $row->nama_siswa ?><br>
									<span style="font-size: smaller;color: gray;">NIS: <?= $row->nis ?><br>
									Kelas: <?= $row->nama_kelas ?></span><br>
								</td>
								<td nowrap>
									<strong><?= $row->nama_kategori_pelanggaran." - ".$row->nama_jenis_pelanggaran ?></strong> <br> 
									<?= $row->nama_pelanggaran." - ".$row->nama_jenis_pelanggaran ?> <br>
									<span style="font-size: smaller;color: gray;"><em>Catatan: <?= $row->catatan?></em></span>
								</td>
								<td class="text-center"><?= $row->poin ?></td>
								<td nowrap>
									<span style="font-size: smaller;color: gray;"><em><?= $row->nama_kategori_sanksi?></em></span><br>
									<?=$row->nama_sanksi ?>
								</td>
								<td nowrap><?= $row->nama_ptk ?></td>
								<td nowrap><?= $row->tgl ?></td>
								<td nowrap><?= $row->status ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>