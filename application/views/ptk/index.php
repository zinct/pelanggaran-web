<section class="section">
	<div class="section-header">
		<h1>Data PTK</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Data Master</a></div>
			<div class="breadcrumb-item active">Data PTK</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Data PTK</h4>
				<div class="card-header-action">
					<a href="<?= base_url('ptk/create') ?>" data-target="#crud-modal" class="btn btn-primary">Tambah Data</a>
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
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							// print_r($this->db->last_query());  
							$i = 1; foreach($ptk as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nama_ptk ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?= base_url('ptk/show/' . $row->id_ptk) ?>"><i class="fas fa-eye"></i> Detail</a></li>
												<li><a class="dropdown-item" href="<?= base_url('ptk/edit/' . $row->id_ptk) ?>"><i class="fas fa-edit"></i> Edit</a></li>
												<!-- <li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->ptk ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li> -->
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
<form action="" method="POST" id="crud">
	<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crud-title">Tambah PTK</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="crud-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Ketik Nama" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Kompetensi</label>
						<select type="text" name="id_kompetensi" id="id_kompetensi" class="form-control" required>
							<option value="">Pilih Kompetensi</option>
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
	function deleteData(id) {
		$('#delete-form').attr('action', `<?= base_url() ?>/ptk/delete/${id}`);
	}
</script>