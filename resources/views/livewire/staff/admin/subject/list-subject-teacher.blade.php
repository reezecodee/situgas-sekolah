<div>
    <div class="mb-4 d-flex gap-2 justify-content-end">
        <a wire:navigate href="{{ route('subject.list') }}">
            <button class="btn btn-danger">Kembali</button>
        </a>
        <a wire:navigate href="{{ route('subject.createTeacher') }}">
            <button class="btn btn-primary">Tambah Guru Pengampu</button>
        </a>
    </div>

    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama guru</th>
                <th>Mata pelajaran</th>
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
                    ajax: '{{ route('dt.subjectTeacher') }}',
                    columns: [
                        { data: 'nama', name: 'nama' },
                        { data: 'pelajaran', name: 'pelajaran' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    </x-slot>
</div>