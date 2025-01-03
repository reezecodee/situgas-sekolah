<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('class.subclass', $class) }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div class="row">
        @foreach ($students as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="https://via.placeholder.com/130x130" class="rounded-circle" alt="" srcset="">
                    </div>
                    <div class="text-center">
                        <h6 class="my-3">{{ $item->nama }}</h6>
                        <a href="">
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