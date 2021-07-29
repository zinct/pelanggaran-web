<section class="section">
	<div class="section-header">
		<h1>Entri Pelanggaran</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item active">Entri Pelanggaran</div>
		</div>
	</div>

	<div class="section-body">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('Pelanggaran_data/store') ?>" method="POST">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="form-group">
								<label>Nama Siswa</label>
								<select class="form-control select2" name="id_siswa" id="select-siswa" required>
								</select>
							</div>
						</div>
						<div class="col-sm-12 col-md-2">
							<div class="form-group">
								<label>Poin Pelanggaran</label>
								<input type="number" class="form-control text-lg bg-white" style="height: 50%;font-size:xx-large;text-align:center;font-weight:bold" name="poin" id="number-poin" value='null' required readonly/>
							</div>
						</div>
						<div class="col-sm-12 col-md-2">
							<div class="form-group">
								<label>Poin Tercatat</label>
								<input type="number" class="form-control text-lg bg-white" style="height: 50%;font-size:xx-large;text-align:center;font-weight:bold" id="number-poin-tercatat" value='null' required readonly/>
							</div>
						</div>
						<div class="col-sm-12 col-md-2">
							<div class="form-group">
								<label>Poin Akumulasi</label>
								<input type="number" class="form-control text-lg bg-white" style="height: 50%;font-size:xx-large;text-align:center;font-weight:bold" id="number-poin-akumulasi" value='null' required readonly/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Kategori Pelanggaran</label>
								<select class="form-control select2" name="id_kategori" id="select-kategori-pelanggaran" required>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Jenis Pelanggaran</label>
								<select class="form-control select2" name="id_jenis" id="select-jenis-pelanggaran" required>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Pelanggaran</label>
								<select class="form-control select2" name="id_pelanggaran" id="select-pelanggaran" required>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Catatan</label>
								<textarea class="form-control" name="catatan" style="height: 100px;"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label id="label-kategori-sanksi" style="font-size: medium; font-weight:bold">Sanksi : -</label>
								<select class="form-control select2" name="id_sanksi" id="select-sanksi" required>
								</select>
							</div>
							<div class="text-center">
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary"/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header iseng-sticky bg-white">
			<h4>Daftar Pelanggaran</h4>
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
								<!-- <td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary" data-toggle="dropdown">Detail</button>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:void(0)" onclick="updateData(<?= $row->id_pelanggaran ?>)"><i class="fas fa-edit"></i> Edit</a></li>
											<li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteData(<?= $row->id_pelanggaran ?>)" data-toggle="modal" data-target="#delete-modal"><i class="fas fa-trash"></i> Delete</a></li>
										</ul>
									</div>
								</td> -->
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</section>

<script>
	$(document).ready(function() {

		var id_siswa ="";
		var poin_tercatat =0;

		function templateResult(item, container) {
			// replace the placeholder with the break-tag and put it into an jquery object
			return $('<span>' + item.text.replace('[br]', '<br/>') + '</span>');
		}

		function templateSelection(item, container) {
			// replace your placeholder with nothing, so your select shows the whole option text
			return item.text.replace('[br]', '');
		}

		$.ajax({
			url: `<?= base_url() ?>siswa/all`,
			success: function(data) {
				$("#select-siswa").empty().append('<option value="">Pilih Siswa</option>');
				data.forEach(i => {
					$("#select-siswa").append("<option value='" + i.id_siswa + "'>" + i.nama_siswa + " (NIS: " + i.nis + ")[br] Kelas: " + i.nama_kelas + "</option>");
				});

				$('#select-siswa').select2({
					templateResult: templateResult,
					templateSelection: templateSelection
				});
			}
		});

		$("#select-siswa").change(function() {
			id_siswa = $("#select-siswa").val();
			$.ajax({
				url: `<?= base_url() ?>siswa/getPoin/${id_siswa}`,
				success: function(data) {
					poin_tercatat = data.poin;
					$("#number-poin-tercatat").val(poin_tercatat);
				}
			});
		});

		$.ajax({
			url: `<?= base_url() ?>kategori_pelanggaran/all`,
			success: function(data) {
				$("#select-kategori-pelanggaran").empty().append('<option value="">Pilih Kategori Pelanggaran</option>');
				data.forEach(i => {
					$("#select-kategori-pelanggaran").append('<option value="'+i.id_kategori_pelanggaran+'">'+i.nama_kategori_pelanggaran+'</option>');
				});

				$("#select-kategori-pelanggaran").change(function(){
					var id_kategori_pelanggaran = $("#select-kategori-pelanggaran").val();
					$.ajax({
						url: `<?= base_url() ?>jenis_pelanggaran/search/${id_kategori_pelanggaran}`,
						success: function(data) {
							$("#select-jenis-pelanggaran").empty().append('<option value="">Pilih Jenis Pelanggaran</option>');
							data.forEach(i => {
								$("#select-jenis-pelanggaran").append('<option value="'+i.id_jenis_pelanggaran+'">'+i.nama_jenis_pelanggaran+'</option>');
							});
				
							$("#select-jenis-pelanggaran").change(function(){
								var id_jenis_pelanggaran = $("#select-jenis-pelanggaran").val();
								$.ajax({
									url: `<?= base_url() ?>pelanggaran/search/${id_jenis_pelanggaran}`,
									success: function(data) {
										$("#select-pelanggaran").empty().append('<option value="">Pilih Pelanggaran</option>');
										data.forEach(i => {
											$("#select-pelanggaran").append('<option value="'+i.id_pelanggaran+'">'+i.nama_pelanggaran+'</option>');
										});
				
										$("#select-pelanggaran").change(function(){
											var id_pelanggaran = $("#select-pelanggaran").val();
											$.ajax({
												url: `<?= base_url() ?>pelanggaran/show/${id_pelanggaran}`,
												success: function(data) {
													$("#number-poin").val(data.poin);
													var poin_akumulasi = Number(data.poin)+Number(poin_tercatat)
													$("#number-poin-akumulasi").val(poin_akumulasi);

													var poin_search = 0;

													if (data.poin < poin_tercatat) {
														poin_search = poin_akumulasi;
													} else{
														poin_search = data.poin;
													}

													$.ajax({
														url: `<?= base_url() ?>sanksi/search/${poin_search}`,
														success: function(data) {
															$("#label-kategori-sanksi").html("Sanksi : "+data.nama_kategori_sanksi);
															$("#select-sanksi").empty().append('<option value="">Pilih Sanksi</option>');
															$("#select-sanksi").append('<option value="'+data.id_sanksi+'" selected>'+data.nama_sanksi+'</option>');
														}
													});
												}
											});
										});
									}
								});
							});
						}
					});
				});
			}
		});
		
	});
</script>