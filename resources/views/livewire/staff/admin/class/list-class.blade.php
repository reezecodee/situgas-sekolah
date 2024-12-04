<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('class.create') }}">
            <button class="btn btn-primary">Buat Kelas Baru</button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body bg-primary text-white rounded d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white fw-bold">Kelas VI</h5>
                        <p class="mb-3 text-white-50">Total ruangan kelas: 10</p>
                        <a href="{{ route('class.subclass') }}" wire:navigate>
                            <button class="btn btn-light">Lihat Selengkapnya...</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body bg-primary text-white rounded d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white fw-bold">Kelas VII</h5>
                        <p class="mb-3 text-white-50">Total ruangan kelas: 12</p>
                        <a href="" wire:navigate>
                            <button class="btn btn-light">Lihat Selengkapnya...</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body bg-primary text-white rounded d-flex align-items-center">
                    <div>
                        <h5 class="mb-0 text-white fw-bold">Kelas VIII</h5>
                        <p class="mb-3 text-white-50">Total ruangan kelas: 13</p>
                        <a href="" wire:navigate>
                            <button class="btn btn-light">Lihat Selengkapnya...</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($classes as $item)
        <p>{{ $item->tingkat }}</p>
    @endforeach
    <x-slot name="script">

    </x-slot>
</div>
