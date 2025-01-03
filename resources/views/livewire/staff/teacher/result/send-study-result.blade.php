<div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('teacher.upload') }}" wire:navigate>
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <form action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Materi</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul materi"
                        required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                        placeholder="Tulis deskripsi singkat tentang materi" required></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Upload Tugas</button>
                </div>
            </form>
        </div>
    </div>
</div>