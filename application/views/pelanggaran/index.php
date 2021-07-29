<section class="section">
	<div class="section-header">
		<h1>Referensi Pelanggaran</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Data Referensi</a></div>
			<div class="breadcrumb-item active">Poin Pelanggaran</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Referensi Pelanggaran</h4>
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
								<th>Nama Pelanggaran</th>
								<th>Kategori</th>
								<th>Jenis</th>
								<th>Poin</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; foreach($pelanggaran as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nama_pelanggaran ?></td>
									<td><?= $row->nama_kategori_pelanggaran ?></td>
									<td><?= $row->nama_jenis_pelanggaran ?></td>
									<td><?= $row->poin ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="updateData(<?= $row->id_pelanggaran ?>)"><i class="fas fa-edit"></i> Edit</a></li>
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_pelanggaran ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li>
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
<form action="<?= base_url('Pelanggaran/store') ?>" method="POST" id="crud">
	<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crud-title">Tambah Pelanggaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="crud-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_pelanggaran" id="nama" class="form-control" placeholder="Ketik Nama" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select type="text" class="form-control" name="kategori_pelanggaran_id" id="kategori_pelanggaran_id" required>
							<option value="">Pilih Kategori Pelanggaran</option>
							<?php foreach($kategori_pelanggaran as $row) : ?>
								<option value="<?= $row->id_kategori_pelanggaran ?>"><?= $row->nama_kategori_pelanggaran ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<select type="text" class="form-control" name="jenis_pelanggaran_id" id="jenis_pelanggaran_id" required>
							<option value="">Pilih Jenis Pelanggaran</option>
							<?php foreach($jenis_pelanggaran as $row) : ?>
								<option value="<?= $row->id_jenis_pelanggaran ?>"><?= $row->nama_jenis_pelanggaran ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Poin</label>
						<input type="text" name="poin" class="form-control" placeholder="Ketik Poin" autocomplete="off" autofocus="on" required>
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
		$('#crud-title').html('Tambah Pelanggaran');
		$('#crud').attr('action', `<?= base_url() ?>pelanggaran/store`);
		document.getElementById('crud').reset(); 
	}
	
	function deleteData(id) {
		$('#delete-form').attr('action', `<?= base_url() ?>pelanggaran/delete/${id}`);
	}

	

	$.ajax({
		url: `<?= base_url() ?>kategori_pelanggaran/all`,
		success: function(data) {
			$("#kategori_pelanggaran_id").empty().append('<option value="">Pilih Kategori Pelanggaran</option>');
			data.forEach(i => {
				$("#kategori_pelanggaran_id").append('<option value="'+i.id_kategori_pelanggaran+'">'+i.nama_kategori_pelanggaran+'</option>');
			});
			
			$("#kategori_pelanggaran_id").change(function(){
				var id_kategori_pelanggaran = $("#kategori_pelanggaran_id").val();
				$.ajax({
					url: `<?= base_url() ?>jenis_pelanggaran/search/${id_kategori_pelanggaran}`,
					success: function(data) {
						$("#jenis_pelanggaran_id").empty().append('<option value="">Pilih Jenis Pelanggaran</option>');
						data.forEach(i => {
							$("#jenis_pelanggaran_id").append('<option value="'+i.id_jenis_pelanggaran+'">'+i.nama_jenis_pelanggaran+'</option>');
						});
					}
				});
			});
		}
	});

	function updateData(id) {
		$('#crud-title').html('Ubah Pelanggaran');
		$('#crud').attr('action', `<?= base_url() ?>pelanggaran/update/${id}`);
		$.ajax({
			url: `<?= base_url() ?>pelanggaran/show/${id}`,
			complete: function() {
				$('#crud-modal').modal('show')
			},
			success: function(data) {
				$('[name="nama_pelanggaran"]').val(data.nama_pelanggaran);
				$('[name="kategori_pelanggaran_id"]').val(data.id_kategori_pelanggaran);
				$('[name="jenis_pelanggaran_id"]').val(data.id_jenis_pelanggaran);
				$('[name="poin"]').val(data.poin);
			}
		});
	}
</script>