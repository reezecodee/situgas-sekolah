<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('teacher.create') }}">
            <button class="btn btn-primary">Tambah Guru</button>
        </a>
    </div>
    <div wire:ignore>
        <table id="teacherTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NUPTK</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#teacherTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.teacher') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'nuptk',
                            name: 'nuptk'
                        },
                        {
                            data: 'status',
                            name: 'status'
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