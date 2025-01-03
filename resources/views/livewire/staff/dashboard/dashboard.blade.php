<div>
    @role('Admin')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Admin</div>
                <div class="card-body -mt-5">
                    <h5 class="card-title fw-bold">{{ $countOfAdmin }}</h5>
                    <p class="card-text">Jumlah admin terdaftar.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Guru</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $countOfTeacher }}</h5>
                    <p class="card-text">Jumlah guru terdaftar.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Siswa</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $countOfStudent }}</h5>
                    <p class="card-text">Jumlah siswa yang aktif.</p>
                </div>
            </div>
        </div>
    </div>
    @endrole
    @role('Guru')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Materi</div>
                <div class="card-body -mt-5">
                    <h5 class="card-title fw-bold">{{ $countOfMateri }}</h5>
                    <p class="card-text">Jumlah materi dibuat.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Jadwal Mengajar</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $countOfSchedule }}</h5>
                    <p class="card-text">Jumlah jadwal mengajar.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Tugas Dibuat</div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $countOfTask }}</h5>
                    <p class="card-text">Jumlah tugas aktif.</p>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>