<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate
            href="{{ route('teacher.presenceHistory', ['subjectTeacherId' => $subjectTeacherId, 'classId' => $classId]) }}">
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
        @if($isPresence)
        <button type="button" class="btn btn-warning" disabled>Sudah absensi</button>
        @else
        <button type="button" class="btn btn-danger" disabled>Belum di mulai</button>
        @endif
    </div>
    @if ($isPresence)
    <hr>
    <div class="card">
        <div class="card-body">
            <h6><b>Bukti pembelajaran</b></h6>
            <hr>
            <form wire:submit.prevent="teachingTestimony">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Pembelajaran materi</label>
                                    <input type="text"
                                        class="form-control @error('pembelajaran_materi') is-invalid @enderror"
                                        wire:model.blur="pembelajaran_materi"
                                        placeholder="Masukkan pembelajaran materi hari ini">
                                    @error('pembelajaran_materi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
                                        wire:model.blur="deskripsi"
                                        placeholder="Masukkan deskripsi materi hari ini"></textarea>
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
                                    <input type="file" class="form-control @error('bukti') is-invalid @enderror"
                                        wire:model="bukti" placeholder="Masukkan pembelajaran materi hari ini">
                                    @error('bukti')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @if($bukti)
                                    <small class="form-text text-muted">
                                        File sebelumnya:
                                        <a href="{{ Storage::url($bukti) }}" target="_blank">Lihat File</a>
                                    </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Edit kegiatan</button>
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
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" width="130" height="130" class="rounded-circle" alt="" srcset="" loading="lazy">
                    </div>
                    <div class="text-center">
                        <h6 class="my-3">{{ $item->nama }}</h6>
                        <div class="dropdown">
                            @if ($item->presenceStudent->last()?->status_kehadiran == 'Hadir')
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @elseif($item->presenceStudent->last()?->status_kehadiran == 'Alpha')
                                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @else
                                    <button class="btn btn-warning dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        @endif
                                        {{ $item->presenceStudent->last()?->status_kehadiran ?? 'Belum presensi' }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button wire:click="presenceStudent('{{ $item->id }}', 'Hadir')"
                                                class="dropdown-item" type="button">Hadir</button>
                                        </li>
                                        <li>
                                            <button wire:click="presenceStudent('{{ $item->id }}', 'Alpha')"
                                                class="dropdown-item" type="button">Alpha</button>
                                        </li>
                                        <li>
                                            <button wire:click="presenceStudent('{{ $item->id }}', 'Izin')"
                                                class="dropdown-item" type="button">Izin</button>
                                        </li>
                                        <li>
                                            <button wire:click="presenceStudent('{{ $item->id }}', 'Sakit')"
                                                class="dropdown-item" type="button">Sakit</button>
                                        </li>
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