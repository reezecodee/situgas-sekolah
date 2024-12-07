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
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Masukkan judul materi" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                        placeholder="Tulis deskripsi singkat tentang materi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah File Materi</label>
                    <input type="file" id="file" name="file" class="form-control"
                        accept=".pdf,.doc,.ppt,.zip" required>
                    <small class="form-text text-muted">Format yang didukung: PDF, DOC, PPT, ZIP (maks. 10 MB)</small>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Upload Tugas</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Diupload pada</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button class="btn btn-primary">Download</button>
                <button class="btn btn-danger">Hapus</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
                <button class="btn btn-primary">Download</button>
                <button class="btn btn-danger">Hapus</button>
            </td>
          </tr>
        </tbody>
    </table>
</div>
