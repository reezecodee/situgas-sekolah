<div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('homeroom.recapitulation') }}" wire:navigate>
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <form wire:submit.prevent="submit">
                <h5><b>Sikap Spiritual</b></h5>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="predikat_spiritual" class="form-label">Predikat</label>
                        <select wire:model.blur="predikat_spiritual" id="predikat_spiritual" class="form-select @error('predikat_spiritual') is-invalid @enderror" required>
                            <option value="" selected>{{ old('predikat_spiritual') ? old('predikat_spiritual') : 'Predikat sikap spiritual' }}</option>
                            <option value="SANGAT BAIK">SANGAT BAIK</option>
                            <option value="BAIK">BAIK</option>
                            <option value="CUKUP">CUKUP</option>
                            <option value="BURUK">BURUK</option>
                        </select>
                        @error('predikat_spiritual')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Masukkan deskripsi" wire:model.blur="deskripsi_spiritual" required></textarea>
                        @error('deskripsi_spiritual')
                            <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <h5><b>Sikap Sosial</b></h5>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="predikat_sosial" class="form-label">Predikat</label>
                        <select wire:model.blur="predikat_sosial" id="predikat_sosial" class="form-select @error('predikat_sosial') is-invalid @enderror" required>
                            <option value="" selected>{{ old('predikat_sosial') ? old('predikat_sosial') : 'Predikat sikap sosial' }}</option>
                            <option value="SANGAT BAIK">SANGAT BAIK</option>
                            <option value="BAIK">BAIK</option>
                            <option value="CUKUP">CUKUP</option>
                            <option value="BURUK">BURUK</option>
                        </select>
                        @error('predikat_sosial')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <div class="form-group">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea class="form-control" placeholder="Masukkan deskripsi" wire:model.blur="deskripsi_sosial" required></textarea>
                        @error('deskripsi_sosial')
                            <span class="text-danger mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan Nilai Sikap</button>
                </div>
            </form>
        </div>
    </div>
</div>
