<section class="section">
	<div class="section-header">
		<h1>Verifikasi Pelanggaran</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item active">Verifikasi Pelanggaran</div>
		</div>
	</div>

	<div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget pb-5">
          <div class="profile-widget-header">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name"><?= $siswa->nama_siswa ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?= $siswa->nama_kelas ?></div></div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Poin Tercatat</label>
                  <input type="number" class="form-control text-lg bg-white" style="height: 50%;font-size:xx-large;text-align:center;font-weight:bold" id="number-poin-tercatat" value='<?= $poin ?>' required readonly/>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Poin Pelanggaran</label>
                  <input type="number" class="form-control text-lg bg-white" style="height: 50%;font-size:xx-large;text-align:center;font-weight:bold" name="poin" id="number-poin" value="<?= $poin_pelanggaran ?>" readonly/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form method="post" class="needs-validation" novalidate="">
            <div class="card-header">
              <h4>Identitas</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6 col-12">
                  <label>NIS</label>
                  <input type="text" class="form-control" value="<?= $siswa->nis ?>" readonly>
                </div>
                <div class="form-group col-md-6 col-12">
                  <label>Kelamin</label>
                  <input type="text" class="form-control" value="<?= $siswa->jenis_kelamin ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6 col-12">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" value="<?= $siswa->tempat_lahir ?>" readonly>
                </div>
                <div class="form-group col-md-6 col-12">
                  <label>Tanggal lahir</label>
                  <input type="text" class="form-control" value="<?= $siswa->tanggal_lahir ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6 col-12">
                  <label>Telp</label>
                  <input type="text" class="form-control" value="<?= $siswa->telp ?>" readonly>
                </div>
                <div class="form-group col-md-6 col-12">
                  <label>Alamat</label>
                  <textarea class="form-control" data-height="100" readonly><?= $siswa->alamat ?></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row mt-sm-4">
    <div class="col">
      <div class="card">
            <div class="card-header">
              <h4>Pelanggaran</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped dataTable" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Aksi</th>
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
                    foreach ($pelanggaran as $row) : ?>
                      <tr>
                        <td class="text-center"><?= $i++ ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">Verifikasi</button>
                            <ul class="dropdown-menu">
                              <form action="<?= base_url('verifikasi_pelanggaran/verifikasi/' . $row->id_pelanggaran_data) ?>" method="POST">
                                <input type="hidden" name="status" value="Disetujui">
                                <li><button type="submit" class="dropdown-item text-success"><i class="fas fa-check"></i> Disetujui</button></li>
                              </form>
                              <form action="<?= base_url('verifikasi_pelanggaran/verifikasi/' . $row->id_pelanggaran_data) ?>" method="POST">
                                <input type="hidden" name="status" value="Anulir">
                                <li><button type="submit" class="dropdown-item text-danger"><i class="fas fa-times"></i> Anulir</button></li>
                              </form>
                            </ul>
                          </div>
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
                        <td nowrap">
                          <?php if($row->status == 'Jatuh Sanksi') : ?>
                            <div class="badge badge-primary">
                              <?= $row->status ?>
                            </div>
                          <?php elseif($row->status == 'Disetujui') : ?>
                            <div class="badge badge-success">
                              <?= $row->status ?>
                            </div>
                          <?php elseif($row->status == 'Anulir') : ?>
                            <div class="badge badge-danger">
                              <?= $row->status ?>
                            </div>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>