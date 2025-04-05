<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('teacher.list') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div wire:ignore class="table-wrapper">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata pelajaran</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Materi</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.teacherAttendance', $teacherId) }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {
                            data: 'mata_pelajaran',
                            name: 'mata_pelajaran'
                        },
                        {
                            data: 'kelas',
                            name: 'kelas'
                        },
                        {
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'pembelajaran_materi',
                            name: 'pembelajaran_materi'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
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