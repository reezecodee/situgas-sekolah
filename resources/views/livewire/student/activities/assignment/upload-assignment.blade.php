<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title">
            <a href="{{ route('student.listAssign', $idTeaching) }}" wire:navigate>
                <button class="btn btn-danger">Kembali</button>
            </a>
        </x-student.navigation.page-header>
    </x-slot>

    <div class="card shadow-sm border-0">
        <div class="card-body text-center">
            <div class="mb-4">
                <img wire:ignore id="fileIcon"
                    src="{{ $fileUploaded ? 'https://www.svgrepo.com/show/255818/pdf.svg' : 'https://www.svgrepo.com/show/529274/upload.svg' }}"
                    width="80" alt="Upload Icon">
            </div>
            <h5 id="fileName" class="card-title fw-bold" wire:ignore>
                {{ $fileUploaded ? $fileUploaded : 'Upload file PDF' }}
            </h5>
            @if($fileUploaded)
            <a href="{{ asset('storage/'.$file_pengerjaan) }}" target="blank" class="mb-4"><u>Lihat file yang diupload
                    sebelumnya.</u></a>
            @endif
            <p class="text-muted mb-4">Pilih file PDF dari perangkat Anda untuk diunggah.</p>
            <form wire:submit.prevent="submit">
                <!-- Input File -->
                <div class="mb-3">
                    <label for="fileInput" class="form-label btn btn-outline-warning px-4 py-2">
                        Pilih File
                    </label>
                    <input type="file" id="fileInput" wire:model.blur="file_pengerjaan" class="d-none" accept=".pdf">
                </div>

                <!-- Pesan Error -->
                <div id="errorMessage" class="text-danger small" style="display: none;"></div>

                <!-- Tombol Submit -->
                <button id="submitButton" type="submit" class="btn btn-primary w-100">{{ $fileUploaded ? 'Upload ulang'
                    : 'Upload' }}</button>
            </form>
        </div>
    </div>


    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const fileInput = document.getElementById('fileInput');
                const fileName = document.getElementById('fileName');
                const fileIcon = document.getElementById('fileIcon');
                const errorMessage = document.getElementById('errorMessage');
                const submitButton = document.getElementById('submitButton');

                fileInput.addEventListener('change', function () {
                    const file = this.files[0];

                    if (file) {
                        if (file.type === 'application/pdf') {
                            fileName.textContent = file.name;
                            fileIcon.src = 'https://www.svgrepo.com/show/255818/pdf.svg';

                            errorMessage.style.display = 'none';
                            submitButton.disabled = false;
                        } else {
                            fileName.textContent = 'Upload File PDF';
                            fileIcon.src = 'https://www.svgrepo.com/show/529274/upload.svg';

                            errorMessage.textContent = 'Hanya file PDF yang diperbolehkan.';
                            errorMessage.style.display = 'block';
                            submitButton.disabled = true;
                        }
                    } else {
                        fileName.textContent = 'Upload File PDF';
                        fileIcon.src = 'https://www.svgrepo.com/show/529274/upload.svg';

                        errorMessage.textContent = 'Silakan pilih file.';
                        errorMessage.style.display = 'block';
                        submitButton.disabled = true;
                    }
                });
            });
        </script>
    </x-slot>
</div>