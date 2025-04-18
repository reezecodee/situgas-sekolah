<div>
    <div class="mb-4 d-flex justify-content-end gap-2">
        <a wire:navigate href="{{ route('class.create') }}">
            <button class="btn btn-primary">Buat Kelas Baru</button>
        </a>
        <a wire:navigate href="{{ route('class.list') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Total Siswa</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.subclass', $classLevel) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'nama', name: 'nama' },
                        { data: 'total_students', name: 'total_students' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });

            document.addEventListener('livewire:load', function () {
                const dataTable = $('#subclassTable').DataTable();

                dataTable.on('draw', function () {
                    Livewire.rescan();
                });
            });
        </script>
    </x-slot>
</div>