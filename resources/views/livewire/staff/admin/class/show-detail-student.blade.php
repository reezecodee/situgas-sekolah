<div>
    <div class="row mb-2">
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">Nama siswa</label>
                <input type="text" class="form-control" value="{{ $student->nama }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ $student->user->email }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">NIS</label>
                <input type="text" class="form-control" value="{{ $student->nis }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">NISN</label>
                <input type="text" class="form-control" value="{{ $student->nisn }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">Tanggal lahir</label>
                <input type="text" class="form-control" value="{{ $student->tgl_lahir }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">Jenis kelamin</label>
                <input type="text" class="form-control" value="{{ $student->jk }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">Alamat</label>
                <input type="text" class="form-control" value="{{ $student->alamat }}" readonly>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="" class="form-label">Status</label>
                <input type="text" class="form-control" value="{{ $student->status }}" readonly>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 justify-content-end">
        <a href="{{ route('class.detail', ['class' => $student->classroom->tingkat, 'id' => $student->kelas_id]) }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
        <a href="{{ route('student.edit', $student->id) }}">
            <button class="btn btn-primary">Edit Siswa</button>
        </a>
    </div>
</div>