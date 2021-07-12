<div class="card mb-3">
	<div class="card-header">
		<h2>
			<?php echo $halaman ;?>
		</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="row">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr align="center">
						<th width="10%">Aksi</th>
						<th>Jurusan</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($jurusan as $jurusan) {
						?>
						<tr>
							<td align="center">
								<a href="<?php echo base_url()."jurusan/detail/".$jurusan->kd_jurusan ; ?>"><button class="btn btn-primary"><i class="fa fa-search"></i></button></a>
							</td>
							<td align="center">
								<?php echo $jurusan->nama_jurusan; ?>
							</td>
							<td align="center">
								<?php echo $jurusan->keterangan; ?>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>