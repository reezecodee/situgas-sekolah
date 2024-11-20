<x-layout.staff :title="$title">
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{ route('prodi.create') }}">
            <button class="btn btn-primary">Buat Prodi Baru</button>
        </a>
    </div>
    <table id="studentsTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#studentsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.students') }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'class',
                            name: 'class'
                        },
                        {
                            data: 'score',
                            name: 'score'
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
</x-layout.staff>
