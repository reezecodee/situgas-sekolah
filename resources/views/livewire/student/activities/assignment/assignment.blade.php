<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <!-- Daftar Tugas -->
    <div class="row">
        @foreach($teachingSchedules as $schedule)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Mata Pelajaran: {{ $schedule->subjectTeacher->subject->nama }}</strong>
                </div>
                <div class="card-body">
                    <div><strong>Total Tugas:</strong> {{ $schedule->totalAssignments }}</div>
                    <div class="mb-2"><strong>Total yang Sudah Dikerjakan:</strong> {{ $schedule->totalCompletedAssignments }}</div>
                    <div class="d-flex justify-content-start">
                        <a href="#" class="btn btn-primary">Lihat Daftar Tugas</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <x-slot name="script">

    </x-slot>
</div>
