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
                  <img class="mr-3 rounded-circle" width="50" src="<?= base_url() ?>assets/img/avatar/avatar-1.png" alt="avatar">
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
  const labels = <?= json_encode($statistik) ?>.map(row => row.nama_bulan);
  const pelanggaran = <?= json_encode($statistik) ?>.map(row => row.pelanggaran);

    new Chart(document.getElementById("myChart"), {
      type: 'line',
      data: {
        labels,
        datasets: [
          {
            label: "Jumlah Pelanggaran",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: pelanggaran,
          },
      ],
      },
      options: {
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            }
          }],
          yAxes: [{
            ticks: {
              padding: 10,
              stepSize: 1,
              min: 0,
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
        }
      }
    });
  </script>