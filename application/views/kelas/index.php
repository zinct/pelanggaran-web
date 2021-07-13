<section class="section">
	<div class="section-header">
		<h1>Data Kelas</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Modules</a></div>
			<div class="breadcrumb-item">DataTables</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Data Kelas</h4>
				<div class="card-header-action">
					<a href="#" data-toggle="modal" data-target="#crud-modal" onclick="createData()" class="btn btn-primary">Tambah Data</a>
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
								<th>Nama Kelas</th>
								<th>Jurusan</th>
								<th>Tahun</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($kelas as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nama_kelas ?></td>
									<td><?= $row->nama_jurusan ?></td>
									<td><?= $row->nama_tahun ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-secondary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="updateData(<?= $row->id_kelas ?>)"><i class="fas fa-edit"></i> Edit</a></li>
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_kelas ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li>
											</ul>
										</div>
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

<!-- CRUD Modal -->
<form action="<?= base_url('Kelas/store') ?>" method="POST" id="crud">
	<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crud-title">Tambah Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="crud-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_kelas" id="nama" class="form-control" placeholder="Ketik Nama" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<select type="text" class="form-control" name="jurusan_id" required>
							<option value="">Pilih Jurusan</option>
							<?php foreach($jurusan as $row) : ?>
								<option value="<?= $row->id_jurusan ?>"><?= $row->nama_jurusan ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<select type="text" class="form-control" name="tahun_id" required>
							<option value="">Pilih Jurusan</option>
							<?php foreach($tahun as $row) : ?>
								<option value="<?= $row->id_tahun ?>"><?= $row->nama_tahun ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>
</form>

<form action="" method="POST" id="delete-form">
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Dihapus?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body text-danger">Data Yang Sudah Dihapus Tidak Bisa Dikembalikan Lagi!</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	function createData() {
		$('#crud-title').html('Tambah Kelas');
		$('#crud').attr('action', `<?= base_url() ?>kelas/store`);
		document.getElementById('crud').reset(); 
	}
	
	function deleteData(id) {
		$('#delete-form').attr('action', `<?= base_url() ?>kelas/delete/${id}`);
	}

	function updateData(id) {
		$('#crud-title').html('Ubah Kelas');
		$('#crud').attr('action', `<?= base_url() ?>kelas/update/${id}`);
		$.ajax({
			url: `<?= base_url() ?>kelas/show/${id}`,
			complete: function() {
				$('#crud-modal').modal('show')
			},
			success: function(data) {
				$('[name="nama_kelas"]').val(data.nama_kelas);
				$('[name="jurusan_id"]').val(data.jurusan_id);
				$('[name="tahun_id"]').val(data.tahun_id);
			}
		});
	}
</script>