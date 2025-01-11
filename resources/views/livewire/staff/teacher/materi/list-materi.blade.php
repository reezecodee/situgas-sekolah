<div>
    <div class="row">
        @foreach($subjects as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->subject->nama }} - Kelas {{ $item->subject->tingkatan }}</h5>
                    <div><strong>Kode mapel:</strong> {{ $item->subject->kode }}</div>
                    <div><strong>Jumlah Materi:</strong> {{ $item->materiCount() }}</div>
                    <div><strong>Kelas:</strong>
                        @php
                        $groupedSchedules = $item->teachingSchedule->groupBy(function ($schedule) {
                        return $schedule->classroom->nama;
                        });
                        @endphp

                        @foreach ($groupedSchedules as $className => $schedules)
                        {{ $className }}@if (!$loop->last), @endif
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-start mt-3">
                        <a href="{{ route('teacher.uploadModule', $item->id) }}">
                            <button class="btn btn-primary">Upload materi</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>