<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SITUGAS MTs BPI Baturompe</title>
  <meta name="description"
    content="Situgas adalah platform milik MTs BPI Baturompe yang didedikasikan untuk mendukung para guru dalam menjalankan tugas mulia mereka.">
  <meta name="keywords" content="situgas">
  <link rel="shortcut icon" href="{{ asset('icon.ico') }}" type="image/x-icon" <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="/images/logo/logo-situgas.png" alt="" class="sitename">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">Tentang kami</a></li>
          <li><a href="#about-web">Tentang aplikasi</a></li>
          <li><a href="#feature">Fitur</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

    </div>
  </header>

  <main class="main">

    <section id="hero" class="hero section">

      <img src="{{ asset('images/landing/mtsbpibaturompe.jpg') }}" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di MTs BPI BATUROMPE</h2>
            <p data-aos="fade-up" data-aos-delay="200">Mengembangkan Potensi dan Prestasi Siswa untuk Masa Depan yang
              Cerah</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
              <a href="{{ route('login') }}" class="btn-get-started">Ayo mulai</a>
            </div>

          </div>
        </div>
      </div>

    </section>

    <section id="about" class="about section section-bg dark-background">

      <div class="container position-relative">

        <div class="row gy-5">

          <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
            <h3>Tentang kami</h3>
            <p>
              MTSS BPI BATUROMPE, sebuah lembaga pendidikan swasta di bawah naungan Kementerian Agama, berlokasi di
              BATUROMPE RT 03/RW 01 JL. CIGANTANG HILIR, Kec. Mangkubumi, Kota Tasikmalaya, Provinsi Jawa Barat.
            </p>
          </div>

          <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-briefcase"></i>
                <h4><a href="" class="stretched-link">Kualitas staff tata usaha</a></h4>
                <p>Kami menyediakan tata usaha yang membantu siswa dalam segala urusan.</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-gem"></i>
                <h4><a href="" class="stretched-link">Guru berkompetensi tinggi</a></h4>
                <p>Kami selalu memastikan kualitas staff guru kami untuk pendidikan yang bermutu.</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-broadcast"></i>
                <h4><a href="" class="stretched-link">Pendidikan dibawah naungan kemenag</a></h4>
                <p>Kami bergerak dibawah naungan kementrian agama republik Indonesia.</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-easel"></i>
                <h4><a href="" class="stretched-link">Materi belajar mengikuti perkembangan zaman</a></h4>
                <p>Kami selalu memastikan pembelajaran yang menyenangkan dan mengikuti perkembangan zaman.</p>
              </div><!-- Icon-Box -->

            </div>
          </div>

        </div>

      </div>

    </section>

    <section id="about-web" class="tabs section">

      <div class="container">

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="tabs-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Guru adalah pilar utama dalam mencerdaskan generasi bangsa</h3>
                <p class="fst-italic">
                  Kami adalah platform yang didedikasikan untuk mendukung para guru dalam menjalankan tugas mulia
                  mereka. Dengan menyediakan solusi digital yang inovatif, kami membantu guru dalam mengelola
                  pembelajaran, memonitor perkembangan siswa, dan menciptakan pengalaman pendidikan yang lebih efektif
                  dan bermakna. Kami percaya bahwa guru adalah fondasi utama dalam mencetak generasi penerus yang cerdas
                  dan berkarakter. Bersama, mari kita wujudkan pendidikan yang lebih maju dan inklusif
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i>
                    <span>Membantu guru mengelola tugas secara terpusat.</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i>
                    <span>Membantu guru mengelola tugas dimana saja.</span>
                  </li>
                  <li><i class="bi bi-check2-all"></i>
                    <span>Membantu memberi penilaian tugas dan absensi secara cepat.</span>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/images/landing/guru.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="tabs-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Neque exercitationem debitis soluta quos debitis quo mollitia officia est</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                  voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                  sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                      consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate
                      velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui
                      a. Ipsum neque dolor voluptate nisi sed.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                      Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                      fugiat nulla pariatur.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/assets/img/working-2.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="tabs-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Voluptatibus commodi ut accusamus ea repudiandae ut autem dolor ut assumenda</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                  voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                  sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                      consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate
                      velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui
                      a. Ipsum neque dolor voluptate nisi sed.</span></li>
                </ul>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore
                  magna aliqua.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/assets/img/working-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="tabs-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Omnis fugiat ea explicabo sunt dolorum asperiores sequi inventore rerum</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                  voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                  sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                      consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate
                      velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                      Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                      fugiat nulla pariatur.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/assets/img/working-4.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>

    <section id="feature" class="services section section-bg dark-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Fitur Unggulan</h2>
        <p>Kami menyediakan fitur unggulan untuk para guru dan siswa.</p>
      </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-briefcase icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="" class="stretched-link">Auto-save</a></h4>
                <p class="description">Guru hanya perlu mengubah status kehadiran siswa dan otomatis akan tersimpan.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-card-checklist icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="" class="stretched-link">Laporan pengerjaan tugas</a></h4>
                <p class="description">Siswa dapat melihat status tugas yang sudah dikerjakan atau belum.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-bar-chart icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="service-details.html" class="stretched-link">Penilaian & komentar</a></h4>
                <p class="description">Kami memberikan kebebasan kepada guru untuk memberikan nilai dan komentar
                  terhadap tugas yang dikerjakan siswa.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-binoculars icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="service-details.html" class="stretched-link">Melihat absensi</a></h4>
                <p class="description">Siswa dapat melihat laporan absensi dari setiap mata pelajaran</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-brightness-high icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="service-details.html" class="stretched-link">Penugasan secara online</a></h4>
                <p class="description">Guru dapat membuat tugas secara online yang nantinya bisa dikerjakan oleh siswa
                  secara online.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-calendar4-week icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a href="service-details.html" class="stretched-link">Kalender Akademik</a></h4>
                <p class="description">Siswa dapat melihat jadwal apa yang akan dilaksanakan oleh pihak sekolah.</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>

    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak kami</h2>
        <p>Beri kami saran dan hubungi kontak kami untuk keperluan lainnya.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-12 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                  data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>Jl. Cigantang Hilir, Kec. Mangkubumi, Kota Tasikmalaya, Jawa Barat.</p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                  data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Telepon</h3>
                  <p>(0265) 3254183</p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                  data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>mtsbpibaturompe@gmail.com</p>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

    </section>

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <div class="footer-contact pt-3">
            <p>JL. Cigantang Hilir</p>
            <p>Kota Tasikmalaya, Jawa Barat</p>
            <p class="mt-3"><strong>Phone:</strong> <span>(0265) 3254183</span></p>
            <p><strong>Email:</strong> <span>mtsbpibaturompe@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Pintasan cepat</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">Tentang kami</a></li>
            <li><a href="#about-web">Tentang aplikasi</a></li>
            <li><a href="#feature">Fitur</a></li>
            <li><a href="#contact">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Informasi</h4>
          <p>Dapatkan informasi terbaru dari kami terkait informasi sekolah.</p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright {{ date('Y') }}</span> <strong class="px-1 sitename">MTs BPI Baturompe</strong> <span>All
          Rights
          Reserved</span></p>
    </div>

  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>