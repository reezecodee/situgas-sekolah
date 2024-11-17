<x-layout.student :title="$title">
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form id="izinForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Masukkan nama siswa" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas"
                                        placeholder="Masukkan kelas siswa" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Masukkan alamat siswa" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tipeIzin" class="form-label">Tipe Izin</label>
                                    <select id="tipeIzin" name="tipeIzin" class="form-select" required>
                                        <option value="">--Pilih tipe izin--</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="alasan" class="form-label">Alasan Ketidakhadiran</label>
                                    <textarea class="form-control" id="alasan" name="alasan" rows="4" placeholder="Jelaskan alasan ketidakhadiran"
                                        required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="button" id="generateBtn" class="btn btn-primary">Preview Surat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Surat -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow d-none" id="suratPreview">
                <div class="card-body">
                    <p class="text-end" id="tanggalSurat"></p>
                    <p>Kepada Yth,</p>
                    <p><strong>Bapak/Ibu Wali Kelas</strong></p>
                    <p>Dengan hormat,</p>
                    <p>Dengan ini kami selaku orang tua/wali dari:</p>
                    <ul>
                        <li>Nama: <span id="previewNama"></span></li>
                        <li>Kelas: <span id="previewKelas"></span></li>
                    </ul>
                    <p>Memberitahukan bahwa anak kami tidak dapat mengikuti kegiatan belajar pada tanggal <span
                            id="previewTanggal"></span>, dikarenakan <span id="previewTipe"></span> - <span
                            id="previewAlasan"></span>.</p>
                    <p>Demikian surat ini kami sampaikan. Atas perhatian dan pengertiannya, kami ucapkan terima kasih.
                    </p>
                    <p class="mt-5">Hormat kami,</p>
                    <p class="mt-4"><strong>Orang Tua/Wali</strong></p>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            document.getElementById('generateBtn').addEventListener('click', function() {
                // Ambil data dari form menggunakan name
                const nama = document.querySelector('[name="nama"]').value;
                const kelas = document.querySelector('[name="kelas"]').value;
                const tanggal = document.querySelector('[name="tanggal"]').value;
                const alamat = document.querySelector('[name="alamat"]').value;
                const tipeIzin = document.querySelector('[name="tipeIzin"]').value;
                const alasan = document.querySelector('[name="alasan"]').value;

                // Validasi sederhana: cek jika ada field kosong
                if (!nama || !kelas || !tanggal || !alamat || !alasan || tipeIzin === '') {
                    alert('Harap isi semua field sebelum membuat surat.');
                    return;
                }

                // Isi data ke dalam preview
                document.getElementById('previewNama').textContent = nama;
                document.getElementById('previewKelas').textContent = kelas;
                document.getElementById('previewTanggal').textContent = tanggal;
                document.getElementById('previewTipe').textContent = tipeIzin;
                document.getElementById('previewAlasan').textContent = alasan;

                // Tampilkan preview
                const suratPreview = document.getElementById('suratPreview');
                suratPreview.classList.remove('d-none');
            });
        </script>
    </x-slot>
</x-layout.student>
