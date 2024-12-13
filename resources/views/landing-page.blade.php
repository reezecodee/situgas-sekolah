<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil MTs BPI BATUROMPE</title>
  <link rel="stylesheet" href="{{ asset('landing/style.css') }}">
</head>
<body>
  <!-- Header Section -->
  <header class="header">
    <div class="container">
      <h1>MTs BPI BATUROMPE</h1>
      <nav>
        <ul>
          <li><a href="{{ route('login') }}"class="btn">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero background-welcome">
    <div class="container">
      <h2>Selamat Datang di MTs BPI BATUROMPE</h2>
      <p>Mengembangkan Potensi dan Prestasi Siswa untuk Masa Depan yang Cerah</p>
      <a href="#about" class="btn">Pelajari Lebih Lanjut</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about">
    <div class="container">
      <h2>Tentang Kami</h2>
      <img src="{{ asset('landing/images/guru.jpg') }}" alt="Gedung Sekolah">
      <p>MTSS BPI BATUROMPE, sebuah lembaga pendidikan swasta di bawah naungan Kementerian Agama, berlokasi di BATUROMPE RT 03/RW 01 JL. CIGANTANG HILIR, Kec. Mangkubumi, Kota Tasikmalaya, Provinsi Jawa Barat. Sekolah ini memiliki peran penting dalam mencetak generasi muda yang berakhlak mulia dan berilmu pengetahuan.</p>
      <p>MTSS BPI BATUROMPE telah diakui kualitasnya dengan diraihnya akreditasi A berdasarkan SK No. 02.00/111/BAP-SM/SK/X/2015 yang diterbitkan pada tanggal 13-10-2015. Hal ini menunjukkan komitmen sekolah dalam memberikan pendidikan berkualitas tinggi kepada para siswanya.</p>
      <p>Lembaga pendidikan ini fokus pada jenjang pendidikan MTs, menitikberatkan pada pengembangan karakter dan nilai-nilai keagamaan. Diharapkan, para lulusan MTSS BPI BATUROMPE mampu bersaing di dunia pendidikan selanjutnya dengan bekal ilmu pengetahuan dan akhlak mulia yang kuat.</p>
      <p>Dengan segala fasilitas dan sumber daya yang tersedia, MTSS BPI BATUROMPE berkomitmen untuk memberikan layanan pendidikan terbaik bagi para siswa dan terus berupaya meningkatkan kualitas pendidikan di Kota Tasikmalaya.</p>
    </div>
  </section>

  <!-- Visi -->
  <section id="visi" class="visi">
    <div class="container">
      <h2>Visi</h2>
      <ul>
        <li>Ikut Mencerdaskan Bangsa Yang Sesuai Dengan Nilai-Nilai Islami</li>
      </ul>
    </div>
  </section>
    <!-- Misi -->
    <section id="misi" class="misi">
        <div class="container">
          <h2>Misi</h2>
          <ul>
            <li>Melaksanakan kegiatan keagamaan, sebagai dasar pembentukan budi pekerti yang luhur, serta Iman dan taqwa kepada Allah SWT</li>
            <li>Mewujudkan kondisi tempat belajar kondusif</li>
            <li>Melaksanakan pembelajaran yang berkarakter</li>
            <li>Membina dan menumbuhkan nilai-nilai seni dan budaya di kalangan siswa</li>
            <li>Membina dan menumbuhkan budaya disiplin berkarakter</li>
            <li>Melatih / menumbuhkan semangat aktifitas dalam mendesain kerajinan tangan</li>
            <li>Mengembangkan keterampilan penggunaan komputer secara intensif dan berkesinambungan</li>
            <li>Bebas buta baca Al-Qur'an</li>
          </ul>
        </div>
      </section>


  <!-- Facilities Section -->
  <section id="facilities" class="facilities">
    <div class="container">
      <h2>Fasilitas</h2>
      <img src="{{ asset('landing/images/ruangan.jpg') }}" alt="Perpustakaan">
      <p>Kami menyediakan fasilitas yang mendukung proses belajar mengajar, termasuk ruang kelas yang luas, laboratorium sains, perpustakaan, dan lapangan olahraga.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact">
    <div class="container">
      <h2>Hubungi Kami</h2>
      <p>Alamat: Jl.Cigantang Hilir No. 115-117, Mangkubumi, Kota Tasikmalaya</p>
      <p>Telepon: (0265) 3254183</p>
      <p>Email: mtsbpibaturompe@gmail.com</p>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 MTs BPI BATUROMPE. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
