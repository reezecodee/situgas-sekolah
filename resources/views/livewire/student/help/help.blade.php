<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <!-- Form Bantuan -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-4">Form Bantuan</h4>
                    <form action="#" method="POST">
                        <!-- Input Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <!-- Input NIS -->
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS (Nomor Induk Siswa)</label>
                            <input type="text" class="form-control" id="nis" name="nis"
                                placeholder="Masukkan NIS Anda" required>
                        </div>

                        <!-- Input Kategori Pertanyaan -->
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Pertanyaan</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Akademik">Akademik</option>
                                <option value="Administrasi">Administrasi</option>
                                <option value="Teknis">Teknis</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Input Pesan -->
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan atau Pertanyaan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Jelaskan permasalahan Anda"
                                required></textarea>
                        </div>

                        <!-- Tombol Kirim -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</div>
