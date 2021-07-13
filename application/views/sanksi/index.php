<section class="section">
	<div class="section-header">
		<h1>Data Sanksi</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Modules</a></div>
			<div class="breadcrumb-item">DataTables</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Data Sanksi</h4>
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
								<th>Nama Sanksi</th>
								<th>Kategori</th>
								<th>Poin</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($sanksi as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nama_sanksi ?></td>
									<td><?= $row->nama_kategori_sanksi ?></td>
									<td><?= $row->min_poin . ' - ' . $row->max_poin ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-secondary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="updateData(<?= $row->id_sanksi ?>)"><i class="fas fa-edit"></i> Edit</a></li>
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_sanksi ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li>
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
<form action="<?= base_url('Sanksi/store') ?>" method="POST" id="crud">
	<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crud-title">Tambah Sanksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="crud-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_sanksi" id="nama" class="form-control" placeholder="Ketik Nama" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select type="text" class="form-control" name="kategori_sanksi_id" required>
							<option value="">Pilih Kategori Sanksi</option>
							<?php foreach($kategori_sanksi as $row) : ?>
								<option value="<?= $row->id_kategori_sanksi ?>"><?= $row->nama_kategori_sanksi ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Minimal Poin</label>
						<input type="number" name="min_poin" class="form-control" placeholder="Ketik Minimal Poin" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Maximal Poin</label>
						<input type="number" name="max_poin" class="form-control" placeholder="Ketik Maximal Poin" autocomplete="off" autofocus="on" required>
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
		$('#crud-title').html('Tambah Sanksi');
		$('#crud').attr('action', `<?= base_url() ?>sanksi/store`);
		document.getElementById('crud').reset(); 
	}
	
	function deleteData(id) {
		$('#delete-form').attr('action', `<?= base_url() ?>sanksi/delete/${id}`);
	}

	function updateData(id) {
		$('#crud-title').html('Ubah Sanksi');
		$('#crud').attr('action', `<?= base_url() ?>sanksi/update/${id}`);
		$.ajax({
			url: `<?= base_url() ?>sanksi/show/${id}`,
			complete: function() {
				$('#crud-modal').modal('show')
			},
			success: function(data) {
				$('[name="nama_sanksi"]').val(data.nama_sanksi);
				$('[name="kategori_sanksi_id"]').val(data.kategori_sanksi_id);
				$('[name="min_poin"]').val(data.min_poin);
				$('[name="max_poin"]').val(data.max_poin);
			}
		});
	}
</script>