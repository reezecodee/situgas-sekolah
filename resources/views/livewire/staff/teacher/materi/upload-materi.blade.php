<div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('teacher.upload') }}" wire:navigate>
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Materi</label>
                    <input type="text" id="title" wire:model.blur="judul" class="form-control @error('judul') is-invalid @enderror"
                        placeholder="Masukkan judul materi">
                    @error('judul')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Keterangan</label>
                    <textarea id="description" wire:model.blur="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="4"
                        placeholder="Tulis keterangan singkat tentang materi"></textarea>
                    @error('keterangan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="file" class="form-label">Unggah File Materi</label>
                        <input type="file" id="file" wire:model.blur="file_materi" class="form-control @error('file_materi') is-invalid @enderror"
                            accept=".pdf">
                        @error('file_materi')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Format yang didukung: PDF (maks. 5 MB)</small>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Upload Materi</button>
                </div>
            </form>
        </div>
    </div>
    @if(!$materis->isEmpty())
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Diupload pada</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($materis as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a target="blank" href="{{ asset('storage/'. $item->file_materi) }}">
                            <button class="btn btn-primary">Lihat</button>
                        </a>
                        <form class="d-inline-block" wire:submit.prevent="deleteMateri('{{ $item->id }}')">
                            <button type="submit" onclick="alert('Apakah kamu yakin ingin menghapus materi ini.')" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="d-flex justify-content-center">
            <img src="https://www.svgrepo.com/show/427101/empty-inbox.svg" alt="" srcset="" width="100">
        </div>
        <div class="text-center mt-2 fw-bold fs-3">
            Belum ada materi tambahan yang diupload.
        </div>
    @endif
</div>
