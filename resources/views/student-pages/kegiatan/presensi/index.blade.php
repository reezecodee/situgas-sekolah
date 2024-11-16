<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

 <!-- Daftar Mata Pelajaran -->
 <div class="row">
    <!-- Mata Pelajaran 1 -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Matematika</h5>
                <p class="card-text">
                    <strong>Pengajar:</strong> Bapak Ahmad Fauzi<br>
                    <strong>Waktu:</strong> 07:30 - 09:00<br>
                    <strong>Kelas:</strong> XII IPA 1
                </p>
                <a href="#" class="btn btn-primary w-100">Presensi</a>
            </div>
        </div>
    </div>

    <!-- Mata Pelajaran 2 -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Fisika</h5>
                <p class="card-text">
                    <strong>Pengajar:</strong> Ibu Siti Nurhaliza<br>
                    <strong>Waktu:</strong> 09:15 - 10:45<br>
                    <strong>Kelas:</strong> XII IPA 1
                </p>
                <a href="#" class="btn btn-primary w-100">Presensi</a>
            </div>
        </div>
    </div>

    <!-- Mata Pelajaran 3 -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Kimia</h5>
                <p class="card-text">
                    <strong>Pengajar:</strong> Bapak Bagas Saputra<br>
                    <strong>Waktu:</strong> 11:00 - 12:30<br>
                    <strong>Kelas:</strong> XII IPA 1
                </p>
                <a href="#" class="btn btn-primary w-100">Presensi</a>
            </div>
        </div>
    </div>

    <!-- Tambahkan Mata Pelajaran Lainnya -->
</div>

    <x-slot name="script">

    </x-slot>
</x-layout.student>
