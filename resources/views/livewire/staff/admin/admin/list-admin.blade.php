<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('admin.create') }}">
            <button class="btn btn-primary">Tambah Admin</button>
        </a>
    </div>
    <table id="adminTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#adminTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.admin') }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'telepon',
                            name: 'telepon'
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
