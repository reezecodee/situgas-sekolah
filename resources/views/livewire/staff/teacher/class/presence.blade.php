<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('teacher.enterClass') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <i class="ti ti-chalkboard display-4"></i>
                        <div style="line-height: 0.5">
                            <h5>{{ $presence->subjectTeacher->subject->kode }}</h5>
                            <p>Kode pelajaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <i class="ti ti-school display-4"></i>
                        <div style="line-height: 0.5">
                            <h5>{{ $presence->subjectTeacher->subject->nama }}</h5>
                            <p>Mata pelajaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        <i class="ti ti-building-bank display-4"></i>
                        <div style="line-height: 0.5">
                            <h5>Kelas {{ $presence->classroom->tingkat }} {{ $presence->classroom->nama }}</h5>
                            <p>Kelas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-2 mb-5">
        <a href="{{ route('teacher.presenceHistory') }}" wire:navigate>
            <button class="btn btn-success">Lihat riwayat presensi</button>
        </a>
        @if($today == $presence->hari && $hour >= $presence->jam_masuk && $hour <= $presence->jam_keluar)
        <form wire:submit.prevent="submit">
            <button type="submit" class="btn btn-primary">Mulai pembelajaran</button>
        </form>
        @elseif($isPresence && $today == $presence->hari)
        <button type="button" class="btn btn-secondary">Sudah absensi</button>
        @else
        <button type="button" class="btn btn-danger">Belum di mulai</button>
        @endif
    </div>
    @if ($isPresence && $today == $presence->hari)
    <hr>
    <div class="card">
        <div class="card-body">
            <h6><b>Ringkasan</b></h6>
            <div class="d-flex align-items-center justify-content-between">
                <p><b>Jumlah siswa:</b> 30</p>
                <p><b>Total hadir:</b> 30</p>
                <p><b>Total tidak hadir:</b> 30</p>
                <p><b>Total izin:</b> 30</p>
                <p><b>Total sakit:</b> 30</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="https://via.placeholder.com/130x130" class="rounded-circle" alt="" srcset="">
                    </div>
                    <div class="text-center">
                        <h6 class="my-3">Budi Santoso</h6>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Kehadiran
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Hadir</a></li>
                              <li><a class="dropdown-item" href="#">Tidak hadir</a></li>
                              <li><a class="dropdown-item" href="#">Izin</a></li>
                              <li><a class="dropdown-item" href="#">Sakit</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
