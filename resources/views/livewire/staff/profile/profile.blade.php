<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form id="profileForm">
                <!-- Foto Profil -->
                <div class="text-center mb-4">
                    <img id="profilePreview" src="https://via.placeholder.com/150" alt="Profile Preview"
                        class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary" id="uploadBtn">Upload Foto
                            Profil</button>
                        <input type="file" id="fileInput" class="form-control d-none" accept="image/*" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Lengkap"
                            value="John Doe" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Lengkap"
                            value="John Doe" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Lengkap"
                            value="John Doe" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Lengkap"
                            value="John Doe" required>
                    </div>
                </div>

                <!-- Button Submit -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script>
            // Menangani klik tombol upload untuk membuka input file
            document.getElementById('uploadBtn').addEventListener('click', function() {
                document.getElementById('fileInput').click();
            });

            // Menangani perubahan pada input file
            document.getElementById('fileInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profilePreview').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </x-slot>
</div>
