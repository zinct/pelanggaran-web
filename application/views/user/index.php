<section class="section">
	<div class="section-header">
		<h1>Data Pengguna</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item active">Data Pengguna</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Data Pengguna</h4>
				<div class="card-header-action">
					<a href="#" data-toggle="modal" data-target="#crud-modal" onclick="createData('ptk')" class="btn btn-primary">Tambah Pengguna PTK</a>
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
								<th>Nama User</th>
								<th>Username</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($user as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nama_user ?></td>
									<td><?= $row->username ?></td>
									<td><?= $row->level ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="updateData('<?= $row->level?>', '<?=$row->id_user ?>')"><i class="fas fa-edit"></i> Edit</a></li>
												<li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_user ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li>
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
<form action="<?= base_url('User/store') ?>" method="POST" id="crud">
	<div class="modal fade" id="crud-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crud-title">Tambah Pengguna PTK</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="crud-body">
					<div class="form-group">
						<label id="label-nama">Nama</label>
						<select class="form-control select2" name="id_ref" id="select-ref" required>
						</select>
					</div>
					<div class="form-group" id="input-user-level">
						<!-- Diisi dengan javascript -->
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" id="username" name="username" class="form-control" placeholder="Buat Username" autocomplete="off" autofocus="on" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" placeholder="Buat Password" autocomplete="off" autofocus="on">
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
	<div class="modal fade" id="delete-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	function createData(level) {
		$("#select-ref").readOnly = false; 

		if (level != 'siswa') {
			$('#crud-title').html('Tambah Pengguna PTK');
			$('#label-nama').html('Nama PTK');
			$('#input-user-level').empty().append('<label>Level</label>'
			+'<select type="text" class="form-control" name="level" required>'
			+	'<option value="">Pilih Level</option>'
			+	'<option value="admin">Admin</option>'
			+	'<option value="kesiswaan">Kesiswaan</option>'
			+	'<option value="bk">Bimbingan Konseling</option>'
			+	'<option value="walikelas">Wali kelas</option>'
			+	'</select>');
			$.ajax({
				url: `<?= base_url() ?>ptk/all`,
				success: function(data) {
					$("#select-ref").empty().append('<option value="">Pilih PTK</option>');
					data.forEach(i => {
						$("#select-ref").append('<option value="'+i.id_ptk+'">'+i.nama_ptk+'</option>');
					});
				}
			});
		} else {
			$('#crud-title').html('Tambah Pengguna Siswa');
			$('#label-nama').html('Nama Siswa');
			$('#input-user-level').empty().append('<label>Level</label>'
			+	'<input type="text" class="form-control" name="level" value="Siswa" readonly required>');
			$.ajax({
				url: `<?= base_url() ?>siswa/all`,
				success: function(data) {
					$("#select-ref").empty().append('<option value="">Pilih Siswa</option>');
					data.forEach(i => {
						$("#select-ref").append('<option value="'+i.id_siswa+'">'+i.nis+' | '+i.nama_siswa+'</option>');
					});
				}
			});
			
			$("#select-ref").change(function(){
				var r = $("#select-ref option:selected").text();
				// console.log(r.split("|")[0].trim());
				$("#username").val(r.split("|")[0].trim());
			});
		}
		$('#crud').attr('action', `<?= base_url() ?>user/store`);
		document.getElementById('crud').reset();
		$("#select-ref").select2();
	}

	function deleteData(id) {
		$('#delete-form').attr('action', `<?= base_url() ?>user/delete/${id}`);
	}

	function updateData(level, id) {
		$("#select-ref").readOnly = true; 

		if (level != 'siswa') {
			$('#crud-title').html('Ubah Pengguna PTK');
			$('#label-nama').html('Nama PTK');
			$('#input-user-level').empty().append('<label>Level</label>'
			+'<select type="text" class="form-control" name="level" required>'
			+	'<option value="">Pilih Level</option>'
			+	'<option value="admin">Admin</option>'
			+	'<option value="kesiswaan">Kesiswaan</option>'
			+	'<option value="bk">Bimbingan Konseling</option>'
			+	'<option value="walikelas">Wali kelas</option>'
			+	'</select>');
			$.ajax({
				url: `<?= base_url() ?>ptk/all`,
				success: function(data) {
					$("#select-ref").empty().append('<option value="">Pilih PTK</option>');
					data.forEach(i => {
						$("#select-ref").append('<option value="'+i.id_ptk+'">'+i.nama_ptk+'</option>');
					});
				}
			});
			$.ajax({
				url: `<?= base_url() ?>user/show/${id}`,
				complete: function() {
					$('#crud-modal').modal('show')
				},
				success: function(data) {
					$('#select-ref').val(data.id_ref).change();
					$('[name="nama_user"]').val(data.nama_user);
					$('[name="username"]').val(data.username);
					$('[name="level"]').val(data.level);
				}
			});
		} else {
			$('#crud-title').html('Ubah Pengguna Siswa');
			$('#label-nama').html('Nama Siswa');
			$('#input-user-level').empty().append('<label>Level</label>'
			+	'<input type="text" class="form-control" name="level" value="Siswa" readonly required>');
			$.ajax({
				url: `<?= base_url() ?>siswa/all`,
				success: function(data) {
					$("#select-ref").empty().append('<option value="">Pilih Siswa</option>');
					data.forEach(i => {
						$("#select-ref").append('<option value="'+i.id_siswa+'">'+i.nis+' | '+i.nama_siswa+'</option>');
					});
				}
			});
			
			$("#select-ref").change(function(){
				var r = $("#select-ref option:selected").text();
				// console.log(r.split("|")[0].trim());
				$("#username").val(r.split("|")[0].trim());
			});
			$.ajax({
				url: `<?= base_url() ?>user/show/${id}`,
				complete: function() {
					$('#crud-modal').modal('show')
				},
				success: function(data) {
					$('#select-ref').val(data.id_ref).change();
					$('[name="nama_user"]').val(data.nama_user);
					$('[name="username"]').val(data.username);
					$('[name="level"]').val(data.level);
				}
			});
		}
		$('#crud').attr('action', `<?= base_url() ?>user/update/${id}`);
		document.getElementById('crud').reset();
		$("#select-ref").select2();
	}
</script>