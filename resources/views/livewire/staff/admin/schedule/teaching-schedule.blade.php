<div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($classes as $item)
        <div class="col">
            <div class="card border-primary h-100">
                <div class="card-body text-center">
                    <h2 class="card-title text-primary">Kelas {{ $item->tingkat }}</h2>
                    <p class="card-text">Tambahkan jadwal mengajar guru untuk tingkat {{ $item->tingkat }}</p>
                    <a wire:navigate href="{{ route('schedule.create', $item->tingkat) }}" class="btn btn-primary">Atur
                        Jadwal</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5>Cari jadwal guru</h5>
            <form wire:submit.prevent="checkSchedule" class="mb-2">
                <div class="d-flex gap-2 justify-content-end">
                    <select class="form-select w-25" wire:model.blur="guru_id">
                        <option selected>Pilih guru</option>
                        @foreach ($teachers as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Cari Jadwal</button>
                </div>
            </form>
            @if(session('message'))
            <x-alert.message color="warning" />
            @endif
            @if($schedules && $schedules->isNotEmpty())
            <table class="table table-striped">
                <tr>
                    <th>Hari</th>
                    <th>Kelas</th>
                    <th>Mata pelajaran</th>
                    <th>Jam</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($schedules as $item)
                <tr>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->classroom->tingkat }} {{ $item->classroom->nama }}</td>
                    <td>{{ $item->subjectTeacher->subject->nama }}</td>
                    <td>{{ $item->jam_masuk }} - {{ $item->jam_keluar }}</td>
                    <td>
                        <form action="{{ route('teachingSchedule.delete', ['id' => $item->id]) }}" method="POST" style="display:inline;" id="form-{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="submitForm('form-{{ $item->id }}')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>         
            @endif
        </div>
    </div>
</div>