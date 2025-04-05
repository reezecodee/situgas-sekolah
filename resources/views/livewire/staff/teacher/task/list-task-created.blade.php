<div>
    <div class="mb-4 d-flex gap-2 justify-content-end">
        <button class="btn btn-success" wire:click="downloadExcel">Rekap Tugas</button>
        <a wire:navigate href="{{ route('teacher.task') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
    </div>
    <div wire:ignore>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul tugas</th>
                    <th>Deskripsi</th>
                    <th>Tanggal mulai</th>
                    <th>Tanggal selesai</th>
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
                        ajax: '{{ route('dt.task', ['id' => $subjectTeacherId, 'classId' => $classId]) }}',
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