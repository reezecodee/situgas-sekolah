<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nama" class="form-label">Nama admin</label>
                    <input type="text" placeholder="Masukkan nama" id="nama" wire:model.blur="nama"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                        autocomplete="off" required>
                    @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nuptk_nis" class="form-label">NUPTK</label>
                    <input type="number" placeholder="Masukkan NUPTK" id="nuptk_nis" wire:model.blur="nuptk_nis"
                        class="form-control @error('nuptk_nis') is-invalid @enderror" value="{{ old('nuptk_nis') }}"
                        autocomplete="off" required>
                    @error('nuptk_nis')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" placeholder="Masukkan email" id="email" wire:model.blur="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        autocomplete="off" required>
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
                    <input type="date" id="tgl_lahir" wire:model.blur="tgl_lahir"
                        class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}"
                        autocomplete="off" required>
                    @error('tgl_lahir')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select wire:model.blur="status" id="status"
                        class="form-select @error('status') is-invalid @enderror" required>
                        <option value="" selected>{{ old('status') ? old('status') : 'Pilih status' }}</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak aktif">Tidak aktif</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 justify-content-end mt-3">
                <a wire:navigate href="{{ route('admin.list') }}">
                    <button type="button" class="btn btn-danger">Kembali</button>
                </a>
                <button type="submit" class="btn btn-primary">Tambah Admin</button>
            </div>
        </div>
    </form>
</div>