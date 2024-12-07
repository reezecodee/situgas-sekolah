<div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('teacher.task') }}" wire:navigate>
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">

            <form action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Tugas</label>
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Masukkan judul tugas" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                        placeholder="Tulis deskripsi singkat tentang materi" required></textarea>
                </div>

                <!-- Upload File -->
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah File Soal</label>
                    <input type="file" id="file" name="file" class="form-control"
                        accept=".pdf,.doc,.ppt,.zip" required>
                    <small class="form-text text-muted">Format yang didukung: PDF, DOC, PPT, ZIP (maks. 10 MB)</small>
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Upload Materi</button>
                </div>
            </form>
        </div>
    </div>
</div>
