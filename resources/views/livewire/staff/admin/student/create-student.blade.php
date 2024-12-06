<div>
    <form wire:model.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nama siswa</label>
                    <input type="text" wire:model.blur="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" autocomplete="off" placeholder="Masukkan nama kelas" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Kelas</label>
                    <select wire:model.blur="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror" required>
                        <option value="" disabled {{ !$kelas_id ? 'selected' : '' }}>Pilih kelas</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('kelas_id', $kelas_id) == $class->id ? 'selected' : '' }}>
                               {{ $class->tingkat }} {{ $class->nama }}
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
                    <label for="" class="form-label">Nomor Induk Siswa (NIS)</label>
                    <input type="number" wire:model.blur="nis" class="form-control @error('nis') is-invalid @enderror"
                        value="{{ old('nis') }}" autocomplete="off" placeholder="Masukkan nis siswa" required>
                    @error('nis')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                    <input type="number" wire:model.blur="nisn" class="form-control @error('nisn') is-invalid @enderror"
                        value="{{ old('nisn') }}" autocomplete="off" placeholder="Masukkan nisn siswa" required>
                    @error('nisn')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Tanggal lahir</label>
                    <input type="date" wire:model.blur="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                        value="{{ old('tgl_lahir') }}" autocomplete="off" placeholder="Masukkan tanggal lahir siswa" required>
                    @error('tgl_lahir')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="email" wire:model.blur="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" autocomplete="off" placeholder="Masukkan email siswa" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Jenis kelamin</label>
                    <select wire:model.blur="jk" class="form-select @error('jk') is-invalid @enderror" required>
                        <option selected {{ old('jk') ? 'value="' . old('jk') . '"' : '' }}>
                            {{ old('jk') ? old('jk') : 'Pilih jenis kelamin' }}</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" wire:model.blur="alamat" id="" cols="10" rows="5" placeholder="Masukkan alamat siswa" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-end mt-3">
            <a href="{{ route('student.list') }}" wire:navigate>
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Siswa</button>
        </div>
    </form>
</div>
