<x-layout.staff :title="$title">
    <form action="" method="POST" enctype="multipart/form-data" id="form-edit">
        @csrf
        @method('PUT')
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
                            <textarea id="editor" name="deskripsi" required></textarea>
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
                <hr class="border-2">
                <p class="fw-bold">Informasi aplikasi</p>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Telepon</label>
                            <input type="text" name="telepon"
                                class="form-control @error('telepon') is-invalid
                                    @enderror"
                                autocomplete="off" value="" placeholder="Masukkan telepon layanan aplikasi">
                            @error('telepon')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email"
                                class="form-control @error('email') is-invalid
                                    @enderror"
                                autocomplete="off" value="" placeholder="Masukkan email layanan aplikasi">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat"
                                class="form-control @error('alamat') is-invalid
                                    @enderror"
                                autocomplete="off" value="" placeholder="Masukkan alamat komunitas">
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">HTML Google Maps</label>
                            <textarea rows="7" type="text" name="google_maps"
                                class="form-control @error('google_maps') is-invalid
                                            @enderror"
                                autocomplete="off" placeholder="Masukkan kode iframe HTML Google Maps"></textarea>
                            @error('google_maps')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr class="border-2">
                <p class="fw-bold">Kutipan motivasi</p>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Nama pembuat kutipan</label>
                            <input type="text" name="pembuat_kutipan"
                                class="form-control @error('pembuat_kutipan') is-invalid
                                    @enderror"
                                autocomplete="off" value=""
                                placeholder="Masukkan nama pembuat kutipan motivasi">
                            @error('pembuat_kutipan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Kutipan motivasi</label>
                            <textarea rows="7" type="text" name="kutipan_motivasi"
                                class="form-control @error('kutipan_motivasi') is-invalid
                                    @enderror"
                                autocomplete="off" placeholder="Masukkan kutipan motivasi"></textarea>
                            @error('kutipan_motivasi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="button" onclick=""><svg class="icon"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-upload-cloud">
                            <polyline points="16 16 12 12 8 16"></polyline>
                            <line x1="12" y1="12" x2="12" y2="21"></line>
                            <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                            <polyline points="16 16 12 12 8 16"></polyline>
                        </svg> Simpan pengaturan</button>
                </div>
            </div>
        </div>
    </form>
</x-layout.staff>
