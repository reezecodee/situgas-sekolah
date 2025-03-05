<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="mapel" class="form-label">Mata pelajaran</label>
                    <select wire:model.blur="mapel_id" id="mapel_id"
                        class="form-select @error('mapel_id') is-invalid @enderror" required>
                        <option selected>Pilih Mata Pelajaran</option>
                        @foreach ($subjects as $item)
                        <option value="{{ $item->id }}" {{ old('mapel_id')==$item->id ? 'selected' : '' }}>
                            {{ $item->nama }} - {{ $item->tingkatan }}
                        </option>
                        @endforeach
                    </select>
                    @error('mapel_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="guru" class="form-label">Guru</label>
                    <select wire:model.blur="guru_id" id="guru"
                        class="form-select @error('guru_id') is-invalid @enderror" required>
                        <option selected>Pilih Guru</option>
                        @foreach ($teachers as $item)
                        <option value="{{ $item->id }}" {{ old('guru_id')==$item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('guru_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-end mt-3">
            <a wire:navigate href="{{ route('subject.teacher') }}">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan Pengampu</button>
        </div>
    </form>
</div>