<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <!-- Daftar Tugas -->
    <div class="row">
        <!-- Tugas 1 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Tugas Fisika</h5>
                    <p class="card-text">
                        <strong>Tugas baru:</strong> Buat laporan praktikum tentang Hukum Newton.<br>
                        <strong>Tenggat Waktu:</strong> 22 November 2024
                    </p>
                    <div class="d-flex justify-content-start">
                        <a href="#" class="btn btn-primary">Lihat Daftar Tugas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">

    </x-slot>
</x-layout.student>
