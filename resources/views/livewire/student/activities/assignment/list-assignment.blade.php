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
            <table id="taskTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal mulai</th>
                        <th>Tanggal selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#taskTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.taskStudent', $id) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {
                            data: 'judul_tugas',
                            name: 'judul_tugas'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                        {
                            data: 'tgl_mulai',
                            name: 'tgl_mulai'
                        },
                        {
                            data: 'tgl_selesai',
                            name: 'tgl_selesai'
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