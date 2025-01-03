<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('class.create') }}">
            <button class="btn btn-primary">Buat Kelas Baru</button>
        </a>
    </div>
    <div class="row">
        @foreach ($classes as $item)
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body bg-primary text-white rounded d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white fw-bold">Kelas {{ $item->tingkat }}</h5>
                        <p class="mb-3 text-white-50">Total ruangan kelas: {{ $item->total }}</p>
                        <a href="{{ route('class.subclass', $item->tingkat) }}" wire:navigate>
                            <button class="btn btn-light">Lihat Selengkapnya...</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if($classes->isEmpty())
        <div class="d-flex justify-content-center">
            <img src="https://www.svgrepo.com/show/427101/empty-inbox.svg" alt="" srcset="" width="100">
        </div>
        <div class="text-center mt-2 fw-bold fs-3">
            Belum ada kelas yang ditambahkan.
        </div>
        @endif
    </div>

    <x-slot name="script">

    </x-slot>
</div>