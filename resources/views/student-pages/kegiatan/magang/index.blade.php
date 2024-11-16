<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <!-- Informasi Kegiatan -->
    <div class="row">
        <!-- Kegiatan 1 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Perusahaan: PT. Techno Corp</h5>
                    <p class="card-text">
                        <strong>Lokasi:</strong> Jakarta Selatan<br>
                        <strong>Deskripsi:</strong> Membantu dalam pengembangan aplikasi web untuk manajemen data perusahaan.<br>
                        <strong>Waktu:</strong> 01 November 2024 - 31 Januari 2025<br>
                        <strong>Status:</strong> <span class="badge bg-success">Berjalan</span>
                    </p>
                    <a href="#" class="btn btn-primary w-100">Detail Kegiatan</a>
                </div>
            </div>
        </div>

        <!-- Kegiatan 2 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Perusahaan: CV. Global Design</h5>
                    <p class="card-text">
                        <strong>Lokasi:</strong> Bandung<br>
                        <strong>Deskripsi:</strong> Membuat desain grafis untuk promosi digital.<br>
                        <strong>Waktu:</strong> 01 Desember 2024 - 28 Februari 2025<br>
                        <strong>Status:</strong> <span class="badge bg-warning text-dark">Akan Dimulai</span>
                    </p>
                    <a href="#" class="btn btn-primary w-100">Detail Kegiatan</a>
                </div>
            </div>
        </div>

        <!-- Kegiatan 3 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Perusahaan: PT. Media Nusantara</h5>
                    <p class="card-text">
                        <strong>Lokasi:</strong> Surabaya<br>
                        <strong>Deskripsi:</strong> Mengerjakan proyek sistem informasi kepegawaian.<br>
                        <strong>Waktu:</strong> 01 Oktober 2024 - 31 Desember 2024<br>
                        <strong>Status:</strong> <span class="badge bg-danger">Selesai</span>
                    </p>
                    <a href="#" class="btn btn-primary w-100">Detail Kegiatan</a>
                </div>
            </div>
        </div>


    <x-slot name="script">

    </x-slot>
</x-layout.student>
