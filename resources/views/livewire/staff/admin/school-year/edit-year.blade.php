<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="periode" class="form-label">Periode tahun ajaran</label>
                    <input type="text" id="periode" wire:model.blur="periode"
                        class="form-control @error('periode') is-invalid @enderror"
                        value="{{ old('periode') }}" placeholder="Contoh: 2024/2025" autocomplete="off" required>
                    @error('periode')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="semester" class="form-label">Semester</label>
                    <select wire:model.blur="semester" id="semester" class="form-select @error('semester') is-invalid @enderror" required>
                        <option value="" selected>{{ old('semester') ? old('semester') : 'Pilih semester' }}</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                    @error('semester')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="tgl_mulai" class="form-label">Tanggal mulai</label>
                    <input type="date" id="tgl_mulai" wire:model.blur="tgl_mulai"
                        class="form-control @error('tgl_mulai') is-invalid @enderror"
                        value="{{ old('tgl_mulai') }}" autocomplete="off" required>
                    @error('tgl_mulai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="tgl_selesai" class="form-label">Tanggal selesai</label>
                    <input type="date" id="tgl_selesai" wire:model.blur="tgl_selesai"
                        class="form-control @error('tgl_selesai') is-invalid @enderror"
                        value="{{ old('tgl_selesai') }}" autocomplete="off" required>
                        @error('tgl_selesai')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select wire:model.blur="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="" selected>{{ old('status') ? old('status') : 'Pilih status' }}</option>
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
            <a wire:navigate href="{{ route('year.list') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Edit Tahun Ajaran</button>
        </div>
    </form>
</div>
