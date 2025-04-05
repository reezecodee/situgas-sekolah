<div>
    <div class="mb-4 d-flex gap-2 justify-content-end">
        <a wire:navigate href="{{ route('subject.teacher') }}">
            <button class="btn btn-success">Lihat Guru Pengampu</button>
        </a>
        <a wire:navigate href="{{ route('subject.create') }}">
            <button class="btn btn-primary">Buat Mata Pelajaran Baru</button>
        </a>
    </div>

    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama pelajaran</th>
                <th>Tingkat kelas</th>
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
                    ajax: '{{ route('dt.subject') }}',
                    columns: [
                        { data: 'kode', name: 'kode' },
                        { data: 'nama', name: 'nama' },
                        { data: 'tingkatan', name: 'tingkatan' },
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    </x-slot>
</div>