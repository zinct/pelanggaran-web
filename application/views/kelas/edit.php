<section class="section">
  <div class="section-header">
    <h1>Data Kelas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="dashboard">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item"><a href="../../Kelas">Data Kelas</a></div>
      <div class="breadcrumb-item active">Peserta Kelas</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="<?= base_url('kelas/update/' . $kelas->id_kelas) ?>" method="POST">
              <div class="row">
                <div class="col-6">
                  <strong>Peserta Kelas</strong>
                  <br>
                  <br>
                  <div class="table-responsive">
                    <table class="table table-striped dataTable" id="table-1">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-center">
                            #
                          </th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // print_r($this->db->last_query());  
                        $i = 1;
                        foreach ($siswa as $row) : ?>
                          <tr>
                            <td class="text-right">
                              <input type="checkbox" name="id_siswa_remove[]" id="table-1-checkbox-id-siswa-<?=$row->id_siswa?>" value="<?=$row->id_siswa?>">
                            </td>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $row->nis ?></td>
                            <td><?= $row->nama_siswa ?></td>
                            <td><?= $row->jenis_kelamin ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <br>
                  <input type="submit" name="submit_remove" id="submit-remove" class="btn btn-danger" value="Keluarkan">
                </div>
                <div class="col-6">
                  <strong>Daftar Siswa Belum Terdaftar</strong>
                  <br>
                  <br>
                  <div class="table-responsive">
                    <table class="table table-striped dataTable" id="table-2">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-center">
                            #
                          </th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // print_r($this->db->last_query());  
                        $i = 1;
                        foreach ($siswa_no_kelas as $row) : ?>
                          <tr>
                            <td class="text-right">
                              <input type="checkbox" name="id_siswa_add[]" id="table-2-checkbox-id-siswa-<?=$row->id_siswa?>" value="<?=$row->id_siswa?>">
                            </td>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $row->nis ?></td>
                            <td><?= $row->nama_siswa ?></td>
                            <td><?= $row->jenis_kelamin ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <br>
                  <input type="submit" name="submit_add" id="submit-add" class="btn btn-primary" value="Tambahkan">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>