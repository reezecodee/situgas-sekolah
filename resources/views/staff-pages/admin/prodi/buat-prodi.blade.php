<x-layout.staff :title="$title">
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nama prodi</label>
                    <input type="text" name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" autocomplete="off" placeholder="Masukkan nama prodi" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Kode prodi</label>
                    <input type="text" name="kode"
                        class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') }}" autocomplete="off" placeholder="Masukkan kode prodi" required>
                    @error('kode')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        value="{{ old('deskripsi') }}" autocomplete="off" placeholder="Masukkan deskripsi prodi" required>
                    @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option selected {{ old('status') ? 'value="'.old('status').'"' : '' }}>{{ old('status') ? old('status') : 'Pilih status' }}</option>
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
            <a href="{{ route('prodi.index') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Prodi</button>
        </div>
    </form>
</x-layout.staff>
