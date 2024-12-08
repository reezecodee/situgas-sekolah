<div>
    @if ($student)
        <div
            class="modal fade show d-block"
            tabindex="-1"
            role="dialog"
            style="background: rgba(0, 0, 0, 0.5);"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cetak Raport</h5>
                        <button
                            type="button"
                            class="btn-close"
                            wire:click="closeModal"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <style>
                            /* Gambar yang diberi efek blur saat hover */
                            .img-a4 {
                                width: 100%;
                                height: 10rem;
                                transition: filter 0.3s ease; /* Untuk transisi efek blur */
                            }

                            /* Efek blur ketika gambar di-hover */
                            .img-a4:hover {
                                filter: blur(4px); /* Efek blur */
                            }

                            /* Teks yang muncul di atas gambar saat hover */
                            .overlay-text {
                                visibility: hidden; /* Sembunyikan teks secara default */
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                font-size: 18px;
                                color: white;
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Efek bayangan untuk teks */
                            }

                            /* Teks muncul saat hover */
                            .img-container:hover .overlay-text {
                                visibility: visible; /* Menampilkan teks saat hover */
                            }

                            /* Container gambar dengan posisi relative untuk overlay */
                            .img-container {
                                position: relative;
                                cursor: pointer;
                            }

                            /* Styling untuk tombol download dengan btn btn-primary */
                            .download-btn-container {
                                text-align: center;
                                margin-top: 10px;
                            }
                        </style>

                        <div class="container">
                            <div class="row">
                                <div class="col-4 mb-2">
                                    <div class="img-container">
                                        <!-- Gambar -->
                                        <img src="{{ $imageUrl }}" class="img-fluid rounded img-a4" alt="Gambar 1">

                                        <!-- Teks "Periksa" muncul saat hover -->
                                        <div class="overlay-text">Periksa</div>
                                    </div>
                                    <!-- Tombol Download dengan btn btn-primary di bawah gambar -->
                                    <div class="download-btn-container">
                                        <button wire:click="downloadCover('{{ $student->id }}')" class="btn btn-primary">Download</button>
                                    </div>
                                </div>

                                <div class="col-4 mb-2">
                                    <div class="img-container">
                                        <img src="{{ $imageUrl }}" class="img-fluid rounded img-a4" alt="Gambar 2">
                                        <div class="overlay-text">Periksa</div>
                                    </div>
                                    <div class="download-btn-container">
                                        <button wire:click="downloadDataStudent('{{ $student->id }}')" class="btn btn-primary">Download</button>
                                    </div>
                                </div>

                                <div class="col-4 mb-2">
                                    <div class="img-container">
                                        <img src="{{ $imageUrl }}" class="img-fluid rounded img-a4" alt="Gambar 3">
                                        <div class="overlay-text">Periksa</div>
                                    </div>
                                    <div class="download-btn-container">
                                        <button wire:click="downloadAttitude('{{ $student->id }}')" class="btn btn-primary">Download</button>
                                    </div>
                                </div>

                                <div class="col-4 mb-2">
                                    <div class="img-container">
                                        <img src="{{ $imageUrl }}" class="img-fluid rounded img-a4" alt="Gambar 3">
                                        <div class="overlay-text">Periksa</div>
                                    </div>
                                    <div class="download-btn-container">
                                        <button wire:click="downloadAcademic('{{ $student->id }}')" class="btn btn-primary">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-danger"
                            wire:click="closeModal"
                        >
                            Batal
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            wire:click="printReport"
                        >
                            Download Semua
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
