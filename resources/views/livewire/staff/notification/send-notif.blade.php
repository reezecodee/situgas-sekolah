<div>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Judul notifikasi</label>
                    <input type="text" class="form-control" placeholder="Masukkan judul" autocomplete="off"
                        wire:model.blur="judul" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Kelas</label>
                    <select wire:model.blur="penerima_id" class="form-select @error('penerima_id') is-invalid @enderror" required>
                        <option value="" {{ !$penerima_id ? 'selected' : '' }}>Pilih kelas</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('penerima_id', $penerima_id) == $user->id ? 'selected' : '' }}>
                               {{ $user->tingkat }} {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('penerima_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="" class="form-label">Pesan notifikasi</label>
                    <textarea wire:model.blur="pesan" class="form-control" placeholder="Isi pesan" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Kirim notifikasi</button>
        </div>
    </form>
</div>
