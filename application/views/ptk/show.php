<section class="section">
  <div class="section-header">
		<h1>Data PTK</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Data Master</a></div>
			<div class="breadcrumb-item"><a href="../../Ptk">Data PTK</a></div>
			<div class="breadcrumb-item active">Detail</div>
		</div>
	</div>

	<div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('ptk/store') ?>" enctype="multipart/form-data" method="POST">
              <div class="row">
                <div class="col-8">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="nama_ptk" placeholder="ketik nama PTK" value="<?= $ptk->nama_ptk ?>" disabled required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">nipy</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="nipy" placeholder="nipy" value="<?= $ptk->nipy ?>" disabled required>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">jk</label>
                    <div class="col-sm-12 col-md-7">
                      <select type="text" class="form-control" name="jk" required disabled>
                        <option value="">Pilih Kelamin</option>
                        <?php foreach($jenis_kelamin as $row) : ?>
                          <?php if ($row == $ptk->jk) : ?>
                            <option value="<?= $row ?>" selected><?= $row ?></option>
                          <?php else : ?>
                            <option value="<?= $row ?>"><?= $row ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">tempat lahir</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="tempat_lahir" value="<?= $ptk->tempat_lahir ?>" required disabled>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">tanggal lahir</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?= $ptk->tanggal_lahir ?>" required disabled>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telp</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="telp" placeholder="telp" value="<?= $ptk->telp ?>" required disabled>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="form-control" name="alamat" data-height="100" placeholder="alamat" disabled><?=$ptk->alamat?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                      <input type="file" class="dropify" name="avatar" data-default-file="<?= $ptk->image ? base_url("upload/img/ptk/$ptk->image") : base_url('assets/img/default/ptk.png') ?>" data-show-remove="false" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1M" />
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
