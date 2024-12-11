<div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('teacher.task') }}" wire:navigate>
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="title" class="form-label">Judul Tugas</label>
                        <input type="text" id="title" wire:model.blur="judul_tugas" class="form-control @error('judul_tugas')
                            is-invalid
                        @enderror"
                            placeholder="Masukkan judul tugas">
                        @error('judul_tugas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea id="description" wire:model.blur="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4"
                            placeholder="Tulis deskripsi singkat tentang materi"></textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="title" class="form-label">Tanggal mulai</label>
                        <input type="date" id="title" wire:model.blur="tgl_mulai" class="form-control @error('tgl_mulai')
                            is-invalid
                        @enderror">
                        @error('tgl_mulai')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="title" class="form-label">Tanggal selesai</label>
                        <input type="date" id="title" wire:model.blur="tgl_selesai" class="form-control @error('tgl_selesai')
                            is-invalid
                        @enderror">
                        @error('tgl_selesai')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="file" class="form-label">Unggah File Soal</label>
                        <input type="file" id="file" wire:model.blur="file_soal" class="form-control @error('file_soal') is-invalid @enderror"
                            accept=".pdf">
                        @error('file_soal')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <small class="form-text text-muted">Format yang didukung: PDF (maks. 5 MB)</small>
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Upload Tugas</button>
                </div>
            </form>
        </div>
    </div>
</div>
