<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="row">
        @foreach($teachingSchedules as $item)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Mata Pelajaran: {{ $item['mapel'] }}</strong>
                </div>
                <div class="card-body">
                    <div><strong>Total Tugas:</strong> {{ $item['total_tugas'] }}</div>
                    <div class="mb-2"><strong>Total yang Sudah Dikerjakan:</strong> {{ $item['tugas_selesai']
                        }}</div>
                    <div class="d-flex justify-content-start gap-2">
                        <a href="{{ route('student.listAssign', $item['pengampu_id']) }}" wire:navigate
                            class="btn btn-primary">Lihat Daftar Tugas</a>
                        <a href="{{ route('student.downloadMateri', $item['pengampu_id']) }}" wire:navigate
                            class="btn btn-success">Lihat Daftar Materi</a>
                        <a href="{{ route('student.myPresence', $item['pengampu_id']) }}" wire:navigate
                            class="btn btn-outline-warning">Absensi Saya</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <x-slot name="script">
        
    </x-slot>
</div>