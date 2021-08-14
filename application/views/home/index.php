<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up" data-aos-delay="400">Selamat Datang Di</h2>
                    <h1 data-aos="fade-up">SISTEM INFORMASI PELANGGARAN SISWA</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">SMK Bakti Nusanatara 666</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                 <canvas id="myChart" height="180"></canvas>
                </div>
            </div>
        </div>
</section><!-- End Hero -->
  
<section id="about" class="about">
      <div class="container">
          <div class="row content">
              <div class="col-lg-5 pt-4 pt-lg-0 d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="150">
                <img src="simpra/img/logo/logoSMK.png" class="img-fluid" width="200px">
              </div>
                  <div class="col-lg-7 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                      <h2>Tentang Pelanggaran Siswa</h2>
                      <p>
                          <strong>Pelanggaran</strong> adalah kegiatan pendidikan, pelatihan dan pembelajaran yang dilaksanakan di Dunia Usaha Atau Dunia Industri dalam upaya pendekatan ataupun untuk meningkatkan mutu siswa Sekolah Menengah Kejuruan (SMK) dengan kompetensi (kemampuan) siswa sesuai bidangnya dan juga menambah bekal untuk masa mendatang guna memasuki dunia kerja yang semangkin banyak serta ketat dalam persaingannya seperti di masa sekarang ini.<br><br>
                          <a href="index.php-4.html?page=about" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                              <span>Selengkapnya</span>
                              <i class="bi bi-arrow-right"></i>
                          </a>
                      </p>
                  </div>
          </div>
      </div>
</section>

<section id="visi" class="faq">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">    
                <header class="section-header col-9 ">
                    <p>- Misi -</p>
                    <h5 class="mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos velit inventore nulla, voluptate officia numquam autem vitae ea facere reiciendis pariatur dolorem suscipit quibusdam aliquam minima assumenda aspernatur ut praesentium! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident dolorem deleniti soluta libero culpa distinctio voluptatibus aliquam reprehenderit nemo rerum aliquid illo hic reiciendis doloremque animi vitae eveniet, recusandae non.</h5>
                </header>
            </div>
        </div>
</section>

<section id="visis" class="values">
      <div class="container" data-aos="fade-up">
          <header class="section-header">
              <p>- Visi -</p>
          </header>
          <div class="row">
              <div class="col-lg-3">
                  <div class="box" data-aos="fade-up" data-aos-delay="200">
                      <img src="img/content/2.png" class="img-fluid" alt="">
                      <h3>1. Menjadikan</h3>
                      <p>Tahapan sosialisasi program PRAKERIN ke semua pihak yang berkaitan dengan kegiatan Prakerin.</p>
                  </div>
              </div>

              <div class="col-lg-3 mt-4 mt-lg-0">
                  <div class="box" data-aos="fade-up" data-aos-delay="400">
                      <img src="img/content/7.png" class="img-fluid" alt="">
                      <h3>2. Menjadikan</h3>
                      
                      <p>Tahapan siswa menentukan Du/Di untuk tempat pelaksanaan Prakerin dan panitia melakukan proses pengajuan/penempatan ke pihak Du/Di.</p>
                  </div>
              </div>

              <div class="col-lg-3 mt-4 mt-lg-0">
                  <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <img src="img/content/3.jpg" class="img-fluid" alt="">
                        <h3>3. Pelaksanaan Prakerin <br><small>Sept-Nov 2021</small></h3>
                        <p>Siswa melaksanankan kegiatan Prakerin di industri/dibawah pengawasan industri.</p>
                  </div>
              </div>
              <div class="col-lg-3 mt-4 mt-lg-0">
                  <div class="box" data-aos="fade-up" data-aos-delay="600">
                        <img src="img/content/6.jpg" class="img-fluid" alt="">
                        <h3>4. Menjadikan</h3>
                        <p>Siswa melaksanakan sidang laporan Praktik kerja industri (Prakerin) .</p>
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
          backgroundColor: "#6777ef",
          // borderColor: "rgb(255, 99, 132)",
          borderWidth: 1,
        },
        {
          label: 'Kelas 11',
          data: kelas11,
          backgroundColor: "pink",
          // borderColor: "rgb(75, 192, 192)",
          borderWidth: 1,
        },
        {
          label: 'Kelas 12',
          data: kelas12,
          backgroundColor: "skyblue",
          // borderColor: "rgb(153, 102, 255)",
          borderWidth: 1,
        },
      ]
    };
  
    new Chart(document.getElementById("myChart"), {
    type: 'bar',
    data: data,
    options: {
       responsive: true,
        scales: {
            yAxes: [{
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
                ticks: {
                    min: 0,
                    stepSize: 1,
                }
            }],
            xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            }   
        }]
        }
      }
  });
  </script>