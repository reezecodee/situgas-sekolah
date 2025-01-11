<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title">
            <a href="{{ route('student.assignment') }}" wire:navigate>
                <button class="btn btn-danger">Kembali</button>
            </a>
        </x-student.navigation.page-header>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table id="materiTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#materiTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.downloadMateri', $id) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {
                            data: 'judul',
                            name: 'judul'
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan'
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