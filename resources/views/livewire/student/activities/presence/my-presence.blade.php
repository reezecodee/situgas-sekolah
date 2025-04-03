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
            <table id="presenceTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Status kehadiran</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#presenceTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.myPresence', $subjectTeacherId) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'hari',
                            name: 'hari'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    </x-slot>
</div>