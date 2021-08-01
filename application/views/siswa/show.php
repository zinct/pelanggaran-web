<section class="section">
  <div class="section-header">
		<h1>Data Siswa</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Data Master</a></div>
			<div class="breadcrumb-item"><a href="../../Siswa">Data Siswa</a></div>
			<div class="breadcrumb-item active">Detail</div>
		</div>
	</div>

	<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('siswa/store') ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-8">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="nis" placeholder="ketik nis" value="<?= $siswa->nis ?>" disabled required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="nama_siswa" placeholder="ketik nama siswa" value="<?= $siswa->nama_siswa ?>" disabled required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                    <div class="col-sm-12 col-md-7">
                      <select type="text" class="form-control" name="jenis_kelamin" disabled required>
                        <option value="">Pilih Kelamin</option>
                        <?php foreach($jenis_kelamin as $row) : ?>
                          <?php if ($row == $siswa->jenis_kelamin) : ?>
                            <option value="<?= $row ?>" selected><?= $row ?></option>
                          <?php else : ?>
                            <option value="<?= $row ?>"><?= $row ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telp</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="telp" value="<?= $siswa->telp ?>" disabled placeholder="ketik telp" required>
                    </div>
                  </div>
                  
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa->tempat_lahir ?>" disabled placeholder="ketik tempat lahir" required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime($siswa->tanggal_lahir)) ?>" disabled required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="form-control" name="alamat" placeholder="ketik alamat" data-height="100" disabled required><?= $siswa->alamat ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select class="form-control" name="status" disabled>
                        <?php foreach($status as $row) : ?>
                          <?php if ($row == $siswa->status) : ?>
                            <option value="<?= $row ?>" selected><?= $row == 1 ? 'Aktif' : 'Tidak aktif' ?></option>
                          <?php else : ?>
                            <option value="<?= $row ?>"><?= $row == 1 ? 'Aktif' : 'Tidak Aktif' ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="form-control" name="keterangan" placeholder="ketik keterangan" data-height="100" readonly><?= $siswa->keterangan ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                      <input type="file" class="dropify" name="avatar" data-default-file="<?= base_url() ?>assets/img/default/siswa.png" data-show-remove="false" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1M" />
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
</section>
