<div>
    <div class="card">
        <div class="card-body">
            <p class="fw-bold">Jadwal Mengajar</p>
            <hr>
            <form wire:submit.prevent="checkSchedule">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="hari" class="form-label">Hari</label>
                            <select wire:model.blur="hari" id="hari"
                                class="form-select @error('hari') is-invalid @enderror" required>
                                <option value="" selected>{{ old('hari') ? old('hari') : 'Pilih hari' }}</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                            @error('hari')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jam masuk</label>
                            <input type="time" wire:model.blur="jam_masuk"
                                class="form-control @error('jam_masuk') is-invalid @enderror"
                                value="{{ old('jam_masuk') }}" autocomplete="off"
                                placeholder="Masukkan jam masuk pelajaran" required>
                            @error('jam_masuk')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jam keluar</label>
                            <input type="time" wire:model.blur="jam_keluar"
                                class="form-control @error('jam_keluar') is-invalid @enderror"
                                value="{{ old('jam_keluar') }}" autocomplete="off"
                                placeholder="Masukkan jam keluar pelajaran" required>
                            @error('jam_keluar')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="guru" class="form-label">Kelas</label>
                            <select wire:model.blur="kelas_id" id="guru"
                                class="form-select @error('kelas_id') is-invalid @enderror" required>
                                <option selected>Pilih kelas</option>
                                @foreach ($subclasses as $item)
                                <option value="{{ $item->id }}" {{ old('kelas_id')==$item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="mapel" class="form-label">Mata pelajaran</label>
                            <select wire:model.blur="mapel_id" id="mapel"
                                class="form-select @error('mapel_id') is-invalid @enderror" required>
                                <option selected>Pilih mata pelajaran</option>
                                @foreach ($subjects as $item)
                                <option value="{{ $item->id }}" {{ old('mapel_id')==$item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Cek Ketersediaan Guru</button>
                </div>
            </form>
        </div>
    </div>
    @if(!$this->checkSchedule()->isEmpty())
    <form wire:submit.prevent="submit">
        <div class="card">
            <div class="card-body">
                <p class="fw-bold">Pilih Guru Pengampu</p>
                <hr>
                <div class="row">
                    @foreach ($this->checkSchedule() as $item)
                    <div class="col-md-3">
                        <div class="form-check">
                            @if ($item->teachingSchedule->isNotEmpty())
                            <input type="radio" value="{{ $item->id }}" class="form-check-input single-checkbox"
                                id="{{ $item->id }}" wire:model="pengampu_id" disabled>
                            <label class="form-check-label text-danger" for="{{ $item->id }}"><del>{{
                                    $item->teacher->nama }}</del></label>
                            @else
                            <input type="radio" value="{{ $item->id }}" class="form-check-input single-checkbox"
                                wire:model="pengampu_id" style="cursor: pointer" id="{{ $item->id }}">
                            <label class="form-check-label" style="cursor: pointer" for="{{ $item->id }}">{{
                                $item->teacher->nama }}</label>
                            @endif
                        </div>
                        @error('pengampu_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <hr>
                <p>Apakah setelah mata pelajaran ini akan ada istirahat? jika iya isi kolom dibawah ini.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jam mulai istirahat</label>
                            <input type="time" wire:model.blur="jam_istirahat_masuk"
                                class="form-control @error('jam_istirahat_masuk') is-invalid @enderror"
                                value="{{ old('jam_istirahat_masuk') }}" autocomplete="off"
                                placeholder="Masukkan jam keluar pelajaran">
                            @error('jam_istirahat_masuk')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="" class="form-label">Jam selesai istirahat</label>
                            <input type="time" wire:model.blur="jam_istirahat_keluar"
                                class="form-control @error('jam_istirahat_keluar') is-invalid @enderror"
                                value="{{ old('jam_istirahat_keluar') }}" autocomplete="off"
                                placeholder="keluarkan jam keluar pelajaran">
                            @error('jam_istirahat_keluar')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" >Buat Jadwal</button>
        </div>
    </form>
    <script>
        document.querySelectorAll('.single-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    document.querySelectorAll('.single-checkbox').forEach(function(cb) {
                        if (cb !== checkbox) {
                            cb.checked = false;
                        }
                    });
                }
            });
        });
    </script>
    @else
    <div class="card">
        <div class="card-body">
            <p class="fw-bold">Pilih Guru Pengampu</p>
            <hr>
            <div class="d-flex justify-content-center">
                <img src="https://www.svgrepo.com/show/427101/empty-inbox.svg" alt="" srcset="" width="100">
            </div>
            <div class="text-center mt-2 fw-bold fs-3">
                Guru pengampu tidak ditemukan.
            </div>
        </div>
    </div>
    @endif
</div>