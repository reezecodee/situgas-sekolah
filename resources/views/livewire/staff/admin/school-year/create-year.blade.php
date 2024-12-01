<div>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Periode tahun ajaran</label>
                    <input type="text" name="tahun-ajaran"
                        class="form-control @error('tahun-ajaran') is-invalid @enderror"
                        value="{{ old('tahun-ajaran') }}" placeholder="Masukkan periode tahun ajaran" autocomplete="off"
                        required>
                    @error('tahun-ajaran')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Semester</label>
                    <select name="semester" class="form-select @error('semester') is-invalid @enderror" required>
                        <option selected {{ old('semester') ? 'value="' . old('semester') . '"' : '' }}>
                            {{ old('semester') ? old('semester') : 'Pilih semester' }}</option>
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
                    <label for="" class="form-label">Tanggal mulai</label>
                    <input type="date" name="tanggal_mulai"
                        class="form-control @error('tanggal_mulai') is-invalid @enderror"
                        value="{{ old('tanggal_mulai') }}" autocomplete="off" required>
                    @error('tanggal_mulai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tanggal selesai</label>
                    <input type="date" name="tanggal_selesai"
                        class="form-control @error('tanggal_selesai') is-invalid @enderror"
                        value="{{ old('tanggal_selesai') }}" autocomplete="off" required>
                    @error('tanggal_selesai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
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
            <a href="{{ route('tahun-ajaran.index') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Tahun Ajaran</button>
        </div>
    </form>
</div>
