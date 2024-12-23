<div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($classes as $item)            
            <div class="col">
                <div class="card border-primary h-100">
                    <div class="card-body text-center">
                        <h2 class="card-title text-primary">Kelas {{ $item->tingkat }}</h2>
                        <p class="card-text">Tambahkan jadwal mengajar guru untuk tingkat {{ $item->tingkat }}</p>
                        <a wire:navigate href="{{ route('schedule.create', $item->tingkat) }}" class="btn btn-primary">Atur Jadwal</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
