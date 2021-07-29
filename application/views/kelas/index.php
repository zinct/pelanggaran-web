<section class="section">
	<div class="section-header">
		<h1>Data Kelas</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Data Master</a></div>
			<div class="breadcrumb-item active">Data Kelas</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Data Kelas<br>
				Tahun Ajaran <?=$tahun->nama_tahun?></h4>
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
								<th>Tingkat</th>
								<th>Wali Kelas</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							// print_r($this->db->last_query());  
							$i = 1; foreach($kelas as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nama_kelas ?></td>
									<td><?= $row->nama_jurusan ?></td>
									<td><?= $row->tingkat ?></td>
									<td><?= $row->nama_ptk ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="updateData(<?= $row->id_kelas ?>)"><i class="fas fa-edit"></i> Edit</a></li>
												<li><a class="dropdown-item" href="<?= base_url('kelas/edit/' . $row->id_kelas) ?>"><i class="fas fa-users"></i> Peserta Kelas</a></li>
												<!-- <li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_kelas ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li> -->
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
						<label>Nama Kelas</label>
						<input type="text" name="nama_kelas" id="nama" class="form-control" placeholder="Ketik Nama" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Tingkat</label>
						<select type="text" class="form-control" name="tingkat" required>
							<option value="">Pilih Tingkat</option>
							<?php
								for ($i=0; $i < sizeof($tingkat); $i++) { 
							?>
								<option value="<?= $tingkat[$i] ?>"><?= $tingkat[$i] ?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<select type="text" class="form-control" name="id_jurusan" required>
							<option value="">Pilih Jurusan</option>
							<?php foreach($jurusan as $row) : ?>
								<option value="<?= $row->id_jurusan ?>"><?= $row->nama_jurusan ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<select type="text" class="form-control" name="id_tahun" required>
							<option value="">Pilih Tahun Ajaran</option>
							<?php foreach($tahuns as $row) : ?>
								<option value="<?= $row->id_tahun ?>"><?= $row->nama_tahun ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group" id="form-wali-kelas">
						<label>Wali Kelas</label>
						<select type="text" class="form-control" name="id_ptk">
							<option value="">Pilih PTK</option>
							<?php foreach($ptk as $row) : ?>
								<option value="<?= $row->id_ptk ?>"><?= $row->nama_ptk ?></option>
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
		$('#form-wali-kelas').hide();
		$('#crud').attr('action', `<?= base_url() ?>kelas/store`);
		document.getElementById('crud').reset(); 
	}
	
	function deleteData(id) {
		$('#delete-form').attr('action', `<?= base_url() ?>kelas/delete/${id}`);
	}
	
	function updateData(id) {
		$('#crud-title').html('Ubah Kelas');
		$('#form-wali-kelas').show();
		$('#crud').attr('action', `<?= base_url() ?>kelas/update/${id}`);
		$.ajax({
			url: `<?= base_url() ?>kelas/show/${id}`,
			complete: function() {
				$('#crud-modal').modal('show')
			},
			success: function(data) {
				$('[name="nama_kelas"]').val(data.nama_kelas);
				$('[name="id_jurusan"]').val(data.id_jurusan);
				$('[name="tingkat"]').val(data.tingkat);
				$('[name="id_tahun"]').val(data.id_tahun);
				$('[name="id_ptk"]').val(data.id_ptk);
			}
		});
	}
</script>