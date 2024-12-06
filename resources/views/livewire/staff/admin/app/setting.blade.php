<div>
    <form action="" method="POST" enctype="multipart/form-data" id="form-edit">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <p class="fw-bold">Upload favicon</p>
                <div class="text-center">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="https://www.svgrepo.com/show/532809/file-zipper.svg" class="w-25 mx-auto"
                            alt="" id="previewExample" style="display: block">
                    </div>
                    <div id="fileName" class="file-name mb-3" style="display: block">asdasdasd</div>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <input type="file" id="fileInput" style="display: none;" accept=".ico, .png, .jpg, .jpeg"
                            name="favicon" value="">
                        <button type="button" class="btn btn-primary" id="uploadButton">Pilih favicon</button>
                    </div>
                    <div id="error-message" style="display:none; color: red;"></div>
                    @error('favicon')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-9">
                <p class="fw-bold">Optimasi SEO</p>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama aplikasi</label>
                            <input type="text" name="nama_aplikasi"
                                class="form-control @error('nama_aplikasi') is-invalid
                                        @enderror"
                                autocomplete="off" value="" placeholder="Masukkan nama aplikasi">
                            @error('nama_aplikasi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Keyword</label>
                            <input type="text" name="keyword"
                                class="form-control @error('keyword') is-invalid
                                        @enderror"
                                autocomplete="off" value="" placeholder="Masukkan keyword pencarian">
                            @error('keyword')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea id="editor" class="form-control" name="deskripsi" required></textarea>
                            @error('deskripsi')
                                <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 mb-2">
                        <p class="form-label">Upload logo</p>
                        <div class="text-center">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="" class="mx-auto" alt="Logo" id="previewExampleLogo"
                                    style="display: block">
                            </div>
                            <div id="fileNameLogo" class="file-name mb-3" style="display: block">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <input type="file" id="fileInputLogo" style="display: none;"
                                    accept=".png, .jpg, .jpeg" name="logo" value="">
                                <button type="button" class="btn btn-primary" id="uploadButtonLogo">Pilih
                                    logo</button>
                            </div>
                            <div id="error-message-logo" style="display:none; color: red;"></div>
                            @error('logo')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <x-slot name="script">
        <script>
            const uploadButton = document.getElementById('uploadButton');
            const fileInput = document.getElementById('fileInput');
            const previewExample = document.getElementById('previewExample');
            const fileNameDisplay = document.getElementById('fileName');
            const errorMessage = document.getElementById('error-message');

            // Saat tombol upload diklik
            uploadButton.addEventListener('click', function() {
                fileInput.click();
            });

            // Saat file dipilih
            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0]; // Ambil file yang dipilih

                if (file) {
                    const fileExtension = file.name.split('.').pop().toLowerCase(); // Mendapatkan ekstensi file

                    if (fileExtension === 'ico') {
                        // Jika file adalah .ico, tampilkan gambar pratinjau default
                        previewExample.src =
                            'https://www.svgrepo.com/show/532809/file-zipper.svg'; // Ganti dengan path gambar default Anda
                    } else if (file.type.startsWith('image/')) {
                        // Jika file adalah gambar, tampilkan pratinjau gambar yang dipilih
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewExample.src = e.target.result; // Menampilkan pratinjau gambar
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Jika bukan gambar atau .ico, tampilkan error
                        errorMessage.textContent = 'Format file tidak didukung.';
                        errorMessage.style.display = 'block';
                        previewExample.style.display = 'none'; // Sembunyikan pratinjau jika format tidak didukung
                        return;
                    }

                    // Tampilkan nama file dan sembunyikan error
                    errorMessage.style.display = 'none';
                    fileNameDisplay.textContent = `${file.name}`;
                    fileNameDisplay.style.display = 'block';
                    previewExample.style.display = 'block';
                } else {
                    fileNameDisplay.style.display = 'none'; // Sembunyikan nama file jika tidak ada file yang dipilih
                }
            });


            // Ambil elemen
            const uploadButtonLogo = document.getElementById('uploadButtonLogo');
            const fileInputLogo = document.getElementById('fileInputLogo');
            const previewExampleLogo = document.getElementById('previewExampleLogo');
            const fileNameDisplayLogo = document.getElementById('fileNameLogo');
            const errorMessageLogo = document.getElementById('error-message-logo');

            // Saat tombol upload diklik
            uploadButtonLogo.addEventListener('click', function() {
                fileInputLogo.click(); // Memicu input file untuk terbuka
            });

            // Saat file dipilih
            fileInputLogo.addEventListener('change', function(event) {
                const file = event.target.files[0]; // Ambil file yang dipilih

                if (file) {
                    const fileExtension = file.name.split('.').pop().toLowerCase(); // Mendapatkan ekstensi file

                    if (fileExtension === 'ico') {
                        // Jika file adalah .ico, tampilkan gambar pratinjau default
                        previewExampleLogo.src =
                            'https://www.svgrepo.com/show/532809/file-zipper.svg'; // Ganti dengan path gambar default Anda
                    } else if (file.type.startsWith('image/')) {
                        // Jika file adalah gambar, tampilkan pratinjau gambar yang dipilih
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewExampleLogo.src = e.target.result; // Menampilkan pratinjau gambar
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Jika bukan gambar atau .ico, tampilkan error
                        errorMessageLogo.textContent = 'Format file tidak didukung.';
                        errorMessageLogo.style.display = 'block';
                        previewExampleLogo.style.display = 'none'; // Sembunyikan pratinjau jika format tidak didukung
                        return;
                    }

                    // Tampilkan nama file dan sembunyikan error
                    errorMessageLogo.style.display = 'none';
                    fileNameDisplayLogo.textContent = `${file.name}`;
                    fileNameDisplayLogo.style.display = 'block';
                    previewExampleLogo.style.display = 'block';
                } else {
                    fileNameDisplayLogo.style.display =
                        'none';
                }
            });
        </script>
    </x-slot>
</div>
