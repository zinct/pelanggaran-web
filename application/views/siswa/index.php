<section class="section">
	<div class="section-header">
		<h1>Data Siswa</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Data Master</a></div>
			<div class="breadcrumb-item active">Data Siswa</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-header iseng-sticky bg-white">
				<h4>Data Siswa<br>
				Tahun Ajaran <?=$tahun->nama_tahun?></h4>
				<div class="card-header-action">
					<a href="#" data-target="#import-modal" data-toggle="modal" class="btn btn-success">Import</a>
					<a href="<?= base_url('siswa/create') ?>" data-target="#crud-modal" class="btn btn-primary">Tambah Data</a>
				</div>
				
			</div>
			<div class="card-body">
				<?php
					if(sizeof($siswa_no_kelas)>=1){
				?>
					<div class="alert alert-warning" role="alert">
						Peringatan! Terdapat <strong><?=sizeof($siswa_no_kelas)?> siswa</strong> yang belum memiliki kelas.
					</div>
				<?php
					}
				?>
				<div class="table-responsive">
					<table class="table table-striped dataTable" id="table-1">
						<thead>
							<tr>
								<th class="text-center">
									#
								</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Kelas</th>
								<th>Jenis Kelamin</th>
								<th>Alamat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							// print_r($this->db->last_query());  
							$i = 1; foreach($siswa as $row) : ?>
								<tr>
									<td class="text-center"><?= $i++ ?></td>
									<td><?= $row->nis ?></td>
									<td><?= $row->nama_siswa ?></td>
									<td><?= $row->nama_kelas ?></td>
									<td><?= $row->jenis_kelamin ?></td>
									<td><?= $row->alamat ?></td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary" data-toggle="dropdown">Detail</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?= base_url('siswa/show/' . $row->id_siswa) ?>"><i class="fas fa-eye"></i> Detail</a></li>
												<li><a class="dropdown-item" href="<?= base_url('siswa/edit/' . $row->id_siswa) ?>"><i class="fas fa-edit"></i> Edit</a></li>
												<!-- <li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_siswa ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li> -->
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

<form action="<?= base_url('siswa/import') ?>" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="import-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="import">Format File Berupa (XLS, XLSX)</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="import" onchange="fileHandler(event)" required>
                <label class="custom-file-label">Choose file</label>
              </div>
            </div>
            <p>Gunakan <a href="<?= base_url('assets/file/TEMPLATE SISWA.xlsx') ?>">template ini</a> untuk melakukan import produk. ikuti langkah dibawah ini : </p>
            <ul class="list-unstyled">
              <li>1. Masukkan data sesuai format (.xls) yang bertanda merah wajib diisi.</li>
              <li>2. Pastikan Tipe Data pada excel adalah TEXT.</li>
              <li>3. Pastikan data anda tidak mengandung karakter seperti (,:;').</li>
              <li>4. Unggah file excel anda pada form input diatas lalu klik 'IMPORT'.</li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </div>
      </div>
    </div>
  </form>

<!-- CRUD Modal -->
<form action="" method="POST" id="crud">
	<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crud-title">Tambah Siswa</h5>
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
		$('#delete-form').attr('action', `<?= base_url() ?>/siswa/delete/${id}`);
	}

	function fileHandler(e) {
      const fileName = e.target.value;
      e.target.nextElementSibling.innerText = fileName;
    }
</script>