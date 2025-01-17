<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('teacher.taskCreated', ['id' => $pengampu_id, 'classId' => $id2]) }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <table class="table">
        <thead class="bg-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Link tugas</th>
                <th scope="col">Status</th>
                <th scope="col">Nilai</th>
                <th scope="col">Komentar guru</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nama }}</td>
                <td>
                    @if ($item->submission->isNotEmpty() && $item->submission->first()->file_pengerjaan)
                    <a href="{{ asset('storage/' . $item->submission->first()->file_pengerjaan) }}" download>Cek
                        pengerjaan</a>
                    @else
                    <span>-</span>
                    @endif
                </td>
                <td>
                    @if ($item->submission->isNotEmpty() && $item->submission->first()->file_pengerjaan)
                    {{ $item->submission->first()->status }}
                    @else
                    Belum dikerjakan
                    @endif
                </td>
                <td>
                    <input type="number" min="0" max="100" class="form-control" placeholder="0"
                        wire:model.blur="nilai.{{ $item->id }}" @if (!optional($item->submission->first())->file_pengerjaan)
                        disabled
                    @endif
                    >
                    @error("nilai.$item->id")
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </td>
                <td>
                    <textarea class="form-control" placeholder="Berikan komentar"
                        wire:model.blur="komentar_guru.{{ $item->id }}" @if (!optional($item->submission->first())->file_pengerjaan) disabled @endif
                        ></textarea>
                    @error("komentar_guru.$item->id")
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </td>
            </tr>
            @endforeach
    </table>
</div>