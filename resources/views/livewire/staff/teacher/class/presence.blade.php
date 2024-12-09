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
        @if($isPresence)
        <button type="button" class="btn btn-warning" disabled>Sudah absensi</button>
        @elseif($hour > $presence->jam_keluar && $today == $presence->hari)
        <button type="button" class="btn btn-danger" disabled>Pembelajaran telah selesai</button>
        @elseif($today == $presence->hari && $hour >= $presence->jam_masuk && $hour <= $presence->jam_keluar)
        <form wire:submit.prevent="submit">
            <button type="submit" class="btn btn-primary">Mulai pembelajaran</button>
        </form>
        @else
        <button type="button" class="btn btn-danger" disabled>Belum di mulai</button>
        @endif
    </div>
    @if ($isPresence && $today == $presence->hari)
        <hr>
        <div class="card">
            <div class="card-body">
                <h6><b>Bukti pembelajaran</b></h6>
                <hr>
                <form wire:submit.prevent="uploadMateri">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Pembelajaran materi</label>
                                    <input type="text" class="form-control @error('pembelajaran_materi') is-invalid @enderror" wire:model.blur="pembelajaran_materi" placeholder="Masukkan pembelajaran materi hari ini">
                                    @error('pembelajaran_materi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea rows="5" class="form-control @error('deskripsi') is-invalid @enderror" wire:model.blur="deskripsi" placeholder="Masukkan deskripsi materi hari ini"></textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Bukti mengajar</label>
                                    <input type="file" class="form-control @error('bukti') is-invalid @enderror" wire:model.blur="bukti" placeholder="Masukkan pembelajaran materi hari ini">
                                    @error('bukti')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan kagiatan hari ini</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6><b>Ringkasan</b></h6>
                <div class="d-flex align-items-center justify-content-between">
                    <p><b>Jumlah siswa:</b> {{ $countStudent }}</p>
                    <p><b>Total hadir:</b> {{ $attend }}</p>
                    <p><b>Total tidak hadir:</b> {{ $alpha }}</p>
                    <p><b>Total izin:</b> {{ $permit }}</p>
                    <p><b>Total sakit:</b> {{ $sick }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($students as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img src="https://via.placeholder.com/130x130" class="rounded-circle" alt="" srcset="">
                        </div>
                        <div class="text-center">
                            <h6 class="my-3">{{ $item->nama }}</h6>
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
            @endforeach
        </div>
    @endif
</div>
