<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title text-center">Surat Permohonan PKL</h5>
                    <p class="text-center text-muted">Silakan isi form berikut untuk mengajukan permohonan PKL.</p>

                    <form id="pklForm">
                        <div class="row">
                            <!-- Data Siswa -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama siswa" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas"
                                        placeholder="Masukkan kelas siswa" required>
                                </div>
                            </div>

                            <!-- Data Perusahaan -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaan" name="perusahaan"
                                        placeholder="Masukkan nama perusahaan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamatPerusahaan" class="form-label">Alamat Perusahaan</label>
                                    <input type="text" class="form-control" id="alamatPerusahaan"
                                        name="alamatPerusahaan" placeholder="Masukkan alamat perusahaan" required>
                                </div>
                            </div>

                            <!-- Tanggal PKL -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggalMulai" class="form-label">Tanggal Mulai PKL</label>
                                    <input type="date" class="form-control" id="tanggalMulai" name="tanggalMulai"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggalSelesai" class="form-label">Tanggal Selesai PKL</label>
                                    <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai"
                                        required>
                                </div>
                            </div>

                            <!-- Alasan dan Catatan -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="alasan" class="form-label">Alasan Permohonan PKL</label>
                                    <textarea class="form-control" id="alasan" name="alasan" rows="4" placeholder="Jelaskan alasan permohonan PKL"
                                        required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Ajukan Permohonan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">

    </x-slot>
</div>
