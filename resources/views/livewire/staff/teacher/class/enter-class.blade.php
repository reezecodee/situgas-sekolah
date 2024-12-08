<div>
    <div class="row">
        @foreach ($teachingSchedules as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h6 class="card-title">Kelas {{ $item->classroom->tingkat }} {{ $item->classroom->nama }}</h6>
                    <p class="card-text mb-1"><strong>Jumlah Siswa:</strong> {{ $item->classroom->students->count() }}</p>
                    <p class="card-text mb-3"><strong>Waktu:</strong> {{ $item->hari }}, {{ $item->jam_masuk }} - {{ $item->jam_keluar }}</p>
                    <a href="{{ route('teacher.presence', $item->id) }}" wire:navigate>
                        <button class="btn btn-primary w-100">Masuk untuk Absensi</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
