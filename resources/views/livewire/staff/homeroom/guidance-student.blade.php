<div>
    <x-slot name="style">

    </x-slot>

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
                        <a href="" wire:navigate>
                            <button class="btn btn-primary">Lihat detail</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <x-slot name="script">

    </x-slot>
</div>
