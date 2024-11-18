<x-layout.staff :title="$title">
    <!-- Form Upload Materi -->
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form action="/upload-materi" method="POST" enctype="multipart/form-data">
                <!-- Mata Pelajaran -->
                <div class="mb-3">
                    <label for="subject" class="form-label">Pilih Mata Pelajaran</label>
                    <select id="subject" name="subject" class="form-select" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Kimia">Kimia</option>
                        <!-- Tambahkan mata pelajaran lainnya -->
                    </select>
                </div>

                <!-- Judul Materi -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Materi</label>
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Masukkan judul materi" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="4"
                        placeholder="Tulis deskripsi singkat tentang materi" required></textarea>
                </div>

                <!-- Upload File -->
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah File Materi</label>
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
</x-layout.staff>
