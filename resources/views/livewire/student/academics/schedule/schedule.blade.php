<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($groupedSchedules as $day => $schedules)
        <div class="col">
            <div class="card border-{{ $backgroundClasses[$day] ?? 'light' }} h-100">
                <div class="card-header text-white bg-{{ $backgroundClasses[$day] ?? 'light' }}">{{ $day }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($schedules as $schedule)
                        <li class="list-group-item">
                            <strong>{{ $schedule->subjectTeacher->subject->nama }}</strong> <br>
                            <small>{{ $schedule->jam_masuk }} - {{ $schedule->jam_keluar }}</small> <br>
                            Guru: {{ $schedule->subjectTeacher->teacher->nama }}
                        </li>
                        @if ($schedule->jam_istirahat_masuk && $schedule->jam_istirahat_keluar)
                        <li class="list-group-item">
                            <strong>Istirahat</strong> <br>
                            <small>{{ $schedule->jam_istirahat_masuk }} - {{ $schedule->jam_istirahat_keluar }}</small>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <x-slot name="script">

    </x-slot>
</div>