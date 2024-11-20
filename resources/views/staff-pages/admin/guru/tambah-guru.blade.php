<x-layout.staff :title="$title">
    <form action="{{ route('guru.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" autocomplete="off" placeholder="Masukkan nama guru" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">NUPTK (opsional)</label>
                    <input type="text" name="nuptk"
                        class="form-control @error('nuptk') is-invalid @enderror"
                        value="{{ old('nuptk') }}" autocomplete="off" placeholder="Masukkan nuptk guru">
                    @error('nuptk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Telepon</label>
                    <input type="number" name="telepon"
                        class="form-control @error('telepon') is-invalid @enderror"
                        value="{{ old('telepon') }}" autocomplete="off" placeholder="Masukkan telepon guru">
                    @error('telepon')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" autocomplete="off" placeholder="Masukkan email guru">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tanggal lahir</label>
                    <input type="date" name="tgl_lahir"
                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                        value="{{ old('tgl_lahir') }}" autocomplete="off" placeholder="Masukkan tanggal lahir">
                    @error('tgl_lahir')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Jenis kelamin</label>
                    <select name="jk" class="form-select @error('jk') is-invalid @enderror" required>
                        <option selected {{ old('jk') ? 'value="'.old('jk').'"' : '' }}>{{ old('jk') ? old('jk') : 'Pilih jenis kelamin' }}</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
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
            <a href="{{ route('guru.index') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Guru</button>
        </div>
    </form>
</x-layout.staff>
