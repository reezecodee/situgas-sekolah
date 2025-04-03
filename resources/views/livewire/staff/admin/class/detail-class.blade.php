<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('class.subclass', $classLevel) }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row">
        @foreach ($students as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="rounded-circle" width="130" height="130" alt="" srcset="">
                    </div>
                    <div class="text-center">
                        <h6 class="my-3">{{ $item->nama }}</h6>
                        <a href="{{ route('class.showDetail', $item->id) }}">
                            <button class="btn btn-primary">Lihat detail</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if($students->isEmpty())
        <div class="d-flex justify-content-center">
            <img src="https://www.svgrepo.com/show/427101/empty-inbox.svg" alt="" srcset="" width="100">
        </div>
        <div class="text-center mt-2 fw-bold fs-3">
            Belum ada siswa di dalam kelas ini.
        </div>
        @endif
    </div>
</div>