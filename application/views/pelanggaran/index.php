<div class="card mb-3">
	<div class="card-header">
		<h2>
			<?php echo $halaman ;?>
		</h2>
	</div>
	<div class="card-body" style="min-height: 450px;">
		<div class="accordion" id="accordionExample">
			<div class="card">
				<div class="card-header" id="headingKepribadian">
					<h2 class="mb-0">
						<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseKepribadian" aria-expanded="false" aria-controls="collapseKepribadian">
							Kepribadian
						</button>
					</h2>
				</div>

				<div id="collapseKepribadian" class="collapse" aria-labelledby="headingKepribadian" data-parent="#accordionExample">
					<div class="card-body">

						<div class="accordion" id="accordionKepribadian">
							<div class="card">
								<div class="card-header" id="headingKetertiban">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseKetertiban" aria-expanded="true" aria-controls="collapseKetertiban">
											Ketertiban
										</button>
									</h2>
								</div>
								<div id="collapseKetertiban" class="collapse" aria-labelledby="headingKetertiban" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($ketertiban as $ketertiban) {
												?>
												<tr>
													<td><?php echo $ketertiban->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $ketertiban->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingRokok">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRokok" aria-expanded="true" aria-controls="collapseRokok">
											Rokok
										</button>
									</h2>
								</div>
								<div id="collapseRokok" class="collapse" aria-labelledby="headingRokok" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($rokok as $rokok) {
												?>
												<tr>
													<td><?php echo $rokok->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $rokok->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingPorno">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePorno" aria-expanded="true" aria-controls="collapsePorno">
											Buku, Majalan, atau Kaset Terlarang
										</button>
									</h2>
								</div>
								<div id="collapsePorno" class="collapse" aria-labelledby="headingPorno" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($porno as $porno) {
												?>
												<tr>
													<td><?php echo $porno->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $porno->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingSenjata">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSenjata" aria-expanded="true" aria-controls="collapseSenjata">
											Senjata
										</button>
									</h2>
								</div>
								<div id="collapseSenjata" class="collapse" aria-labelledby="headingPorno" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($senjata as $senjata) {
												?>
												<tr>
													<td><?php echo $senjata->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $senjata->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingMabok">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMabok" aria-expanded="true" aria-controls="collapseMabok">
											Obat / Minuman Terlarang
										</button>
									</h2>
								</div>
								<div id="collapseMabok" class="collapse" aria-labelledby="headingPorno" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($mabok as $mabok) {
												?>
												<tr>
													<td><?php echo $mabok->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $mabok->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingPerkelahian">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePerkelahian" aria-expanded="true" aria-controls="collapsePerkelahian">
											Perkelahian
										</button>
									</h2>
								</div>
								<div id="collapsePerkelahian" class="collapse" aria-labelledby="headingPorno" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($perkelahian as $perkelahian) {
												?>
												<tr>
													<td><?php echo $perkelahian->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $perkelahian->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingPelanggaran">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePelanggaran" aria-expanded="true" aria-controls="collapsePelanggaran">
											Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan
										</button>
									</h2>
								</div>
								<div id="collapsePelanggaran" class="collapse" aria-labelledby="headingPorno" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($pelanggaran as $pelanggaran) {
												?>
												<tr>
													<td><?php echo $pelanggaran->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $pelanggaran->poin ; ?></th>
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
			</div>


			<div class="card">
				<div class="card-header" id="headingTwo">
					<h2 class="mb-0">
						<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseKerajinan" aria-expanded="false" aria-controls="collapseKerajinan">
							Kerajinan
						</button>
					</h2>
				</div>
				<div id="collapseKerajinan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="card-body">
						
						<div class="accordion" id="accordionKerajinan">
							<div class="card">
								<div class="card-header" id="headingKeterkambatan">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseKeterkambatan" aria-expanded="true" aria-controls="collapseKeterkambatan">
											Keterkambatan
										</button>
									</h2>
								</div>
								<div id="collapseKeterkambatan" class="collapse" aria-labelledby="headingKetertiban" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($keterlambatan as $keterlambatan) {
												?>
												<tr>
													<td><?php echo $keterlambatan->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $keterlambatan->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingKehadiran">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseKehadiran" aria-expanded="true" aria-controls="collapseKehadiran">
											Kehadiran
										</button>
									</h2>
								</div>
								<div id="collapseKehadiran" class="collapse" aria-labelledby="headingRokok" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($kehadiran as $kehadiran) {
												?>
												<tr>
													<td><?php echo $kehadiran->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $kehadiran->poin ; ?></th>
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
			</div>




			<div class="card">
				<div class="card-header" id="headingKerapihan">
					<h2 class="mb-0">
						<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseKerapihan" aria-expanded="false" aria-controls="collapseKerapihan">
							Kerapihan
						</button>
					</h2>
				</div>
				<div id="collapseKerapihan" class="collapse" aria-labelledby="headingKerapihan" data-parent="#accordionExample">
					<div class="card-body">
						
						<div class="accordion" id="accordionKerapihan">
							<div class="card">
								<div class="card-header" id="headingPakaian">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePakaian" aria-expanded="true" aria-controls="collapsePakaian">
											Pakaian
										</button>
									</h2>
								</div>
								<div id="collapsePakaian" class="collapse" aria-labelledby="headingKetertiban" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($pakaian as $pakaian) {
												?>
												<tr>
													<td><?php echo $pakaian->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $pakaian->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingRambut">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRambut" aria-expanded="true" aria-controls="collapseRambut">
											Rambut
										</button>
									</h2>
								</div>
								<div id="collapseRambut" class="collapse" aria-labelledby="headingRokok" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($rambut as $rambut) {
												?>
												<tr>
													<td><?php echo $rambut->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $rambut->poin ; ?></th>
												</tr>
												<?php
											}
											?>
										</table>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header" id="headingBadan">
									<h2 class="mb-0">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseBadan" aria-expanded="true" aria-controls="collapseBadan">
											Badan
										</button>
									</h2>
								</div>
								<div id="collapseBadan" class="collapse" aria-labelledby="headingRokok" data-parent="#accordionKepribadian">
									<div class="card-body">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr>
												<th>Pelanggaran</th>
												<th width="20%" style="text-align: center;">Poin</th>
											</tr>
											<?php
											foreach ($badan as $badan) {
												?>
												<tr>
													<td><?php echo $badan->pelanggaran ; ?></td>
													<th width="20%" style="text-align: center;"><?php echo $badan->poin ; ?></th>
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
			</div>
		</div>
	</div>
</div>