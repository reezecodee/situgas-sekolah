<div>
    <div class="row">
        @foreach ($tasks as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Kelas {{ $item->classroom->tingkat }} {{ $item->classroom->nama }}</h5>
                    <p><strong>Mata Pelajaran:</strong> {{ $item->subjectTeacher->subject->nama }}</p>
                    <p><strong>Jumlah Tugas Aktif:</strong> {{ $item->assignment_count }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('teacher.taskCreated', $item->id) }}" wire:navigate>
                            <button class="btn btn-primary">Lihat</button>
                        </a>
                        <a href="{{ route('teacher.uploadTask', $item->id) }}" wire:navigate>
                            <button class="btn btn-success">Buat Tugas</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
