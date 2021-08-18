<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Siswa</h4>
          </div>
          <div class="card-body">
            <?= $jumlah_siswa ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total PTK</h4>
          </div>
          <div class="card-body">
            <?= $jumlah_ptk ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pelanggaran</h4>
          </div>
          <div class="card-body">
            <?= $jumlah_pelanggaran ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Jatuh Sanksi</h4>
          </div>
          <div class="card-body">
            <?= $jumlah_pelanggaran_pending ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Statistics</h4>
      </div>
      <div class="card-body">
        <canvas id="myChart" height="140"></canvas>
      </div>
    </div>
  </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Pelanggaran</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
              <?php foreach($aktifitas as $row) : ?>
                <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="<?= $row->image ? base_url("upload/img/siswa/$row->image") : base_url('assets/img/default/siswa.png') ?>" alt="avatar">
                  <div class="media-body">
                    <div class="float-right text-primary"><?= date('Y-m-d', strtotime($row->tgl))  ?></div>
                    <div class="media-title"><?= $row->nama_siswa ?></div>
                    <div class="text-muted text-small"><?= $row->nama_kelas ?></div>
                    <span class="text-small text-muted"><?= $row->nama_pelanggaran ?></span>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <div class="text-center pt-1 pb-1">
              <a href="<?= base_url('laporan_pelanggaran') ?>" class="btn btn-primary btn-lg btn-round">
                View All
              </a>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<script>
  const pelanggaran = <?= json_encode($pelanggaran) ?>.map(row => row.pelanggaran);
  const kelas12 = <?= json_encode($kelas12) ?>.map(row => row.total);
  const kelas11 = <?= json_encode($kelas11) ?>.map(row => row.total);
  const kelas10 = <?= json_encode($kelas10) ?>.map(row => row.total);

  const labels = pelanggaran;
  const data = {
    labels: labels,
    datasets: [
      {
        label: 'Kelas 10',
        data: kelas10,
        backgroundColor: "rgba(255, 99, 132, 0.2)",
        borderColor: "rgb(255, 99, 132)",
        borderWidth: 1,
      },
      {
        label: 'Kelas 11',
        data: kelas11,
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        borderColor: "rgb(75, 192, 192)",
        borderWidth: 1,
      },
      {
        label: 'Kelas 12',
        data: kelas12,
        backgroundColor: "rgba(153, 102, 255, 0.2)",
        borderColor: "rgb(153, 102, 255)",
        borderWidth: 1,
      },
    ]
  };

  new Chart(document.getElementById("myChart"), {
    type: 'bar',
    data: data,
    options: {
       responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Chart.js Bar Chart'
          }
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            
        }
      }
  });

  
  </script>