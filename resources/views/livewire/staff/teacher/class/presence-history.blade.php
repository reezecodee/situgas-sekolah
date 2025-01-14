<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('teacher.presence', ['id' => $id, 'classId' => $classId]) }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div wire:ignore>
        <table id="adminTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pembelajaran materi</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#adminTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.presenceHistory', ['id' => $id, 'classId' => $classId]) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'pembelajaran_materi',
                            name: 'pembelajaran_materi'
                        },
                        {
                            data: 'bukti',
                            name: 'bukti'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    </x-slot>
</div>