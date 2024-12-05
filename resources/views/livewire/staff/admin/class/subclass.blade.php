<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('class.list') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <table id="subclassTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Total Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#subclassTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.subclass', $class) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'nama', name: 'nama' },
                        { data: 'students_count', name: 'students_count' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    </x-slot>
</div>
