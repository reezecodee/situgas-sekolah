<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('class.subclass') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nama kelas</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" autocomplete="off" placeholder="Masukkan nama kelas" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tingkat</label>
                    <select name="tingkat" class="form-select @error('tingkat') is-invalid @enderror" required>
                        <option selected {{ old('tingkat') ? 'value="' . old('tingkat') . '"' : '' }}>
                            {{ old('tingkat') ? old('tingkat') : 'Pilih tingkat' }}</option>
                        {{-- <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option> --}}
                        <option value="VI">VI</option>
                        <option value="VII">VII</option>
                        <option value="IX">IX</option>
                    </select>
                    @error('tingkat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Program studi</label>
                    <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror" required>
                        <option selected {{ old('prodi_id') ? 'value="' . old('prodi_id') . '"' : '' }}>
                            {{ old('prodi_id') ? old('prodi_id') : 'Pilih program studi' }}</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                    @error('prodi_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
            {{-- <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tahun ajaran</label>
                    <select name="tahun_ajaran_id" class="form-select @error('tahun_ajaran_id') is-invalid @enderror"
                        required>
                        <option selected {{ old('tahun_ajaran_id') ? 'value="' . old('tahun_ajaran_id') . '"' : '' }}>
                            {{ old('tahun_ajaran_id') ? old('tahun_ajaran_id') : 'Pilih tahun ajaran' }}</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                    @error('tahun_ajaran_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
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
            <a href="{{ route('class.list') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Edit Kelas</button>
        </div>
    </form>
</div>
