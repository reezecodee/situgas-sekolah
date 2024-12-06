<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Judul jadwal</label>
                    <input type="text" wire:model.blur="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}" autocomplete="off" placeholder="Masukkan judul jadwal" required>
                    @error('judul')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Keterangan</label>
                    <select wire:model.blur="keterangan" class="form-select @error('keterangan') is-invalid @enderror" required>
                        <option selected {{ old('keterangan') ? 'value="' . old('keterangan') . '"' : '' }}>
                            {{ old('keterangan') ? old('keterangan') : 'Pilih keterangan' }}</option>
                        <option value="Libur">Libur</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    @error('keterangan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tanggal mulai</label>
                    <input type="date" wire:model.blur="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror"
                        value="{{ old('tgl_mulai') }}" autocomplete="off" required>
                    @error('tgl_mulai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tanggal selesai</label>
                    <input type="date" wire:model.blur="tgl_selesai"
                        class="form-control @error('tgl_selesai') is-invalid @enderror" value="{{ old('tgl_selesai') }}"
                        autocomplete="off" required>
                    @error('tgl_selesai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-end mt-3">
            <a href="{{ route('calendar.index') }}" wire:navigate>
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
        </div>
    </form>
</div>
