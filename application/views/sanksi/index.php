<div class="card mb-3">
	<div class="card-header">
		<h2>
			<?php echo $halaman ;?>
		</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="accordion" id="accordionExample">
			<div class="card">
				<div class="card-header" id="headingRingan">
					<h2 class="mb-0">
						<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseRingan" aria-expanded="false" aria-controls="collapseRingan">
							Kategori Ringan
						</button>
					</h2>
				</div>

				<div id="collapseRingan" class="collapse" aria-labelledby="headingRingan" data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<tr>
								<th>Pelanggaran</th>
								<th width="20%" style="text-align: center;">Poin</th>
							</tr>
							<?php
							foreach ($ringan as $ringan) {
								?>
								<tr>
									<td><?php echo $ringan->jenis_sanksi ; ?></td>
									<th width="20%" style="text-align: center;"><?php echo $ringan->total_poin ; ?></th>
								</tr>
								<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header" id="headingSedang">
					<h2 class="mb-0">
						<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseSedang" aria-expanded="false" aria-controls="collapseSedang">
							Kategori Sedang
						</button>
					</h2>
				</div>

				<div id="collapseSedang" class="collapse" aria-labelledby="headingSedang" data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<tr>
								<th>Pelanggaran</th>
								<th width="20%" style="text-align: center;">Poin</th>
							</tr>
							<?php
							foreach ($sedang as $sedang) {
								?>
								<tr>
									<td><?php echo $sedang->jenis_sanksi ; ?></td>
									<th width="20%" style="text-align: center;"><?php echo $sedang->total_poin ; ?></th>
								</tr>
								<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header" id="headingBerat">
					<h2 class="mb-0">
						<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseBerat" aria-expanded="false" aria-controls="collapseBerat">
							Kategori Berat
						</button>
					</h2>
				</div>
			</div>
			
			<div class="card">
				<div id="collapseBerat" class="collapse" aria-labelledby="headingBerat" data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<tr>
								<th>Pelanggaran</th>
								<th width="20%" style="text-align: center;">Poin</th>
							</tr>
							<?php
							foreach ($berat as $berat) {
								?>
								<tr>
									<td><?php echo $berat->jenis_sanksi ; ?></td>
									<th width="20%" style="text-align: center;"><?php echo $berat->total_poin ; ?></th>
								</tr>
								<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>