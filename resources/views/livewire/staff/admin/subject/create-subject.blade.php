<div>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nama pelajaran</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" autocomplete="off" placeholder="Masukkan nama pelajaran" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Kode pelajaran</label>
                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') }}" autocomplete="off" placeholder="Masukkan kode pelajaran" required>
                    @error('kode')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Kelompok</label>
                    <input type="text" name="kelompok" class="form-control @error('kelompok') is-invalid @enderror"
                        value="{{ old('kelompok') }}" autocomplete="off" placeholder="Masukkan kelompok pelajaran"
                        required>
                    @error('kelompok')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
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
                    <label for="" class="form-label">Kompetensi keahlian</label>
                    <select name="kompetensi" class="form-select @error('kompetensi') is-invalid @enderror" required>
                        <option selected {{ old('kompetensi') ? 'value="' . old('kompetensi') . '"' : '' }}>
                            {{ old('kompetensi') ? old('kompetensi') : 'Pilih kompetensi' }}</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                    @error('tingkat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
        </div>
        <div class="d-flex gap-2 justify-content-end mt-3">
            <a wire:navigate href="{{ route('subject.list') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Pelajaran</button>
        </div>
    </form>
</div>
