<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nama pelajaran</label>
                    <input type="text" wire:model.blur="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" autocomplete="off" placeholder="Masukkan nama pelajaran" required>
                    @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Kode pelajaran</label>
                    <input type="text" wire:model.blur="kode" class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') }}" autocomplete="off" placeholder="Masukkan kode pelajaran" required>
                    @error('kode')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tingkat</label>
                    <select wire:model.blur="tingkatan" class="form-select @error('tingkatan') is-invalid @enderror"
                        required>
                        <option selected {{ old('tingkatan') ? 'value="' . old('tingkatan') . '"' : '' }}>
                            {{ old('tingkatan') ? old('tingkatan') : 'Pilih tingkat' }}</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                    </select>
                    @error('tingkatan')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Status</label>
                    <select wire:model.blur="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option selected {{ old('status') ? 'value="' . old('status') . '"' : '' }}>
                            {{ old('status') ? old('status') : 'Pilih status' }}</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak aktif">Tidak aktif</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-end mt-3">
            <a wire:navigate href="{{ route('subject.list') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Pelajaran</button>
        </div>
    </form>
</div>